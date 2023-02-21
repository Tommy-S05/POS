<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Http\Requests\StoreProviderRequest;
use App\Http\Requests\UpdateProviderRequest;
use Illuminate\Database\Eloquent\Builder;

/**
 * @mixin Builder
 */

class ProviderController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('can:providers.index')->only(['index']);
        $this->middleware('can:providers.create')->only(['create', 'store']);
        $this->middleware('can:providers.show')->only(['show']);
        $this->middleware('can:providers.edit')->only(['edit', 'update']);
        $this->middleware('can:providers.destroy')->only(['destroy']);
    }
    public function index()
    {
        $providers = Provider::all();
        return view('admin.provider.index', compact('providers'));
    }
    public function create()
    {
        return view('admin.provider.create');
    }
    public function store(StoreProviderRequest $request)
    {
        $newProvider = Provider::create($request->all());
        return redirect()->route('providers.index');
    }
    public function show(Provider $provider)
    {
        return view('admin.provider.show', compact('provider'));
    }
    public function edit(Provider $provider)
    {
        return view('admin.provider.edit', compact('provider'));
    }
    public function update(UpdateProviderRequest $request, Provider $provider)
    {
//        $provUpd = Provider::find($provider->id);
//        $provUpd->name = $request->name;
//        $provUpd->email = $request->email;
//        $provUpd->ruc_number = $request->ruc_number;
//        $provUpd->address = $request->address;
//        $provUpd->phone = $request->phone;
//        $provUpd->save();
        $provider->update($request->all());
        return redirect()->route('providers.index');
    }
    public function destroy(Provider $provider)
    {
        $provider->delete();
        return redirect()->route('providers.index');
    }
}
