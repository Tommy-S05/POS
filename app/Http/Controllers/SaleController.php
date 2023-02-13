<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Product;
use App\Models\Sale;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateSaleRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

class SaleController extends Controller
{
//    public function __construct(){
//        $this->middleware('auth');
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::all();
        return view('admin.sale.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        $products = Product::all();
        return view('admin.sale.create', compact('clients', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSaleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSaleRequest $request)
    {
        $newSale = Sale::create($request->all()+[
                'user_id'=> Auth::user()->id,
                'sale_date' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        foreach ($request->product_id as $key => $product){
            $results[] = array("product_id" => $request->product_id[$key],
                "quantity" => $request->quantity[$key], "price" => $request->price[$key],
                "discount" => $request->discount[$key]);
        }

        $newSale->saleDetails()->createMany($results);

        return redirect()->route('sales.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        $subtotal = 0;
        $saleDetails = $sale->saleDetails;
        foreach ($saleDetails as $saleDetail){
            $subtotal += $saleDetail->quantity * $saleDetail->price -
                (($saleDetail->quantity * $saleDetail->price) * $saleDetail->discount / 100);
        }

        return view('admin.sale.show', compact('sale', 'subtotal', 'saleDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
//        $clients = Client::all();
//        return view('admin.sale.edit', compact('sale', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSaleRequest  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSaleRequest $request, Sale $sale)
    {
//        $sale->update($request->all());
//        return redirect()->route('sales.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
//        $sale->delete();
//        return redirect()->route('sales.index');
    }

    //Paquete de PDF de DOMPDF
    public function pdf(Sale $sale)
    {
        $subtotal = 0;
        $saleDetails = $sale->saleDetails;
        foreach ($saleDetails as $saleDetail){
            $subtotal += $saleDetail->quantity * $saleDetail->price -
                (($saleDetail->quantity * $saleDetail->price) * $saleDetail->discount / 100);
        }

        $pdf = Pdf::loadView('admin.sale.pdf', compact('sale', 'subtotal', 'saleDetails'));
        return $pdf->stream('Reporte_de_Venta_'.$sale->id.'.pdf');
    }

    //Print Driver de mike42 escpos-php
    public function print(Sale $sale){
        try {
            $subtotal = 0;
            $saleDetails = $sale->saleDetails;
            foreach ($saleDetails as $saleDetail){
                $subtotal += $saleDetail->quantity * $saleDetail->price -
                    (($saleDetail->quantity * $saleDetail->price) * $saleDetail->discount / 100);
            }
            $printer_name = "TM20";
            $connector = new WindowsPrintConnector($printer_name);
            $printer = new Printer($connector);

            $printer->text('$RD 9.95\n');

            $printer->cut();
            $printer->close();

            return redirect()->back();

        } catch (\Throwable $throwable){
//            echo $throwable->getMessage();
            return redirect()->back();
        }

    }
    public function change_status(Sale $sale){
        if ($sale->status == 'VALID'){
            $sale->status = 'CANCELED';
            $sale->save();
            return redirect()->back();
        }
        else{
            $sale->status = 'VALID';
            $sale->save();
        }
        return redirect()->back();
    }
}
