<?php

namespace App\Http\Controllers;

use App\Models\Printer;
use App\Http\Requests\StorePrinterRequest;
use App\Http\Requests\UpdatePrinterRequest;

class PrinterController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('can:printers.index')->only(['index']);
        $this->middleware('can:printers.update')->only(['update']);
    }
    public function index()
    {
        $printer = Printer::where('id', '=', 1)->firstOrFail();
        return view('admin.printer.index', compact('printer'));
    }
//    public function create()
//    {
//        //
//    }
//    public function store(StorePrinterRequest $request)
//    {
//        //
//    }
//    public function show(Printer $printer)
//    {
//        //
//    }
//    public function edit(Printer $printer)
//    {
//        //
//    }
    public function update(UpdatePrinterRequest $request, Printer $printer)
    {
        $printer->update($request->all());
        return redirect()->route('printers.index');
    }
//    public function destroy(Printer $printer)
//    {
//        //
//    }
}
