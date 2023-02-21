<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('can:roles.index')->only(['index']);
        $this->middleware('can:roles.create')->only(['create', 'store']);
        $this->middleware('can:roles.show')->only(['show']);
        $this->middleware('can:roles.edit')->only(['edit', 'update']);
        $this->middleware('can:roles.destroy')->only(['destroy']);
    }
    public function index()
    {
        $roles = Role::all();
        return view('admin.role.index', compact('roles'));
    }
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.role.create', compact('permissions'));
    }
    public function store(Request $request)
    {
        $role = Role::create($request->all());
        if ($request->special == 'all-access'){
            $role->givePermissionTo(Permission::all());
            return redirect()->route('roles.index');
        }
        elseif ($request->special == 'no-access'){
            return redirect()->route('roles.index');
        }
        else{
            $role->permissions()->sync($request->get('permissions'));
            return redirect()->route('roles.index');
        }
//        $role->syncPermissions($request->get('permissions'));
    }
    public function show(Role $role)
    {
        $users = User::role($role)->get();
        return view('admin.role.show', compact('role', 'users'));
    }
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.role.edit', compact('role', 'permissions'));
    }
    public function update(Request $request, Role $role)
    {
        $role->update($request->all());
        if ($request->special == 'all-access'){
            $role->givePermissionTo(Permission::all());
            return redirect()->route('roles.index');
        }
        elseif ($request->special == 'no-access'){
            $role->revokePermissionTo(Permission::all());
            return redirect()->route('roles.index');
        }
        else{
            $role->permissions()->sync($request->get('permissions'));
            return redirect()->route('roles.index');
        }
//        $role->syncPermissions($request->get('permissions'));
    }
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->back();
    }
}
