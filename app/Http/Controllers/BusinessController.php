<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Http\Requests\StoreBusinessRequest;
use App\Http\Requests\UpdateBusinessRequest;


class BusinessController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('can:businesses.index')->only(['index']);
        $this->middleware('can:businesses.update')->only(['update']);
    }
    public function index()
    {
        $business = Business::where('id', '=', 1)->firstOrFail();
        return view('admin.business.index', compact('business'));
    }
//    public function create()
//    {
//        //
//    }
//    public function store(StoreBusinessRequest $request)
//    {
//        //
//    }
//    public function show(Business $business)
//    {
//        //
//    }
//    public function edit(Business $business)
//    {
//        //
//    }
    public function update(UpdateBusinessRequest $request, Business $business)
    {
//        $filename = "";
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $destinationPath = 'images/';
            $filename = time() . "-" . $file->getClientOriginalName();
            $uploadSuccess = $request->file('picture')->move($destinationPath, $filename);
            $business->logo = $filename;
        }
        
        $business->update($request->all());
        return redirect()->route('businesses.index');
    }
//    public function destroy(Business $business)
//    {
//        //
//    }
}
