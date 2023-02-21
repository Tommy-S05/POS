<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('can:users.index')->only(['index']);
        $this->middleware('can:users.create')->only(['create', 'store']);
        $this->middleware('can:users.show')->only(['show']);
        $this->middleware('can:users.edit')->only(['edit', 'update']);
        $this->middleware('can:users.destroy')->only(['destroy']);
    }
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }
    public function create()
    {
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }
    public function store(Request $request)
    {
        $user = User::create($request->all());
        $user->update(['password' => Hash::make($request->password)]);
        $user->roles()->sync($request->get('roles'));
        return redirect()->route('users.index');
    }
    public function show(User $user)
    {
        return view('admin.role.show', compact('user'));
    }
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.user.edit', compact('user', 'roles'));
    }
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->get('roles'));
        return redirect()->route('users.index');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
