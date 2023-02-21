<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;

class ClientController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('can:clients.index')->only(['index']);
        $this->middleware('can:clients.create')->only(['create', 'store']);
        $this->middleware('can:clients.show')->only(['show']);
        $this->middleware('can:clients.edit')->only(['edit', 'update']);
        $this->middleware('can:clients.destroy')->only(['destroy']);
    }
    public function index()
    {
        $clients = Client::all();
        return view('admin.client.index', compact('clients'));
    }
    public function create()
    {
        return view('admin.client.create');
    }
    public function store(StoreClientRequest $request)
    {
        $newClient = Client::create($request->all());
        return redirect()->route('clients.index');
    }

    public function show(Client $client)
    {
        return view('admin.client.show', compact('client'));
    }
    public function edit(Client $client)
    {
        return view('admin.client.edit', compact('client'));
    }
    public function update(UpdateClientRequest $request, Client $client)
    {
        $client->update($request->all());
        return redirect()->route('clients.index');
    }
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index');
    }
}
