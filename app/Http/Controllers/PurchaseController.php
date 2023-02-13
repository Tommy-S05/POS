<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Provider;
use App\Models\Purchase;
use App\Http\Requests\StorePurchaseRequest;
use App\Http\Requests\UpdatePurchaseRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
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
        $purchases = Purchase::all();
        return view('admin.purchase.index', compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $providers = Provider::all();
        $products = Product::all();
        return view('admin.purchase.create', compact('providers', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePurchaseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePurchaseRequest $request)
    {
        $newPurchase = Purchase::create($request->all()+[
                'user_id'=> Auth::user()->id,
                'purchase_date' => Carbon::now()->format('Y-m-d H:i:s')
            ]);
        foreach ($request->product_id as $key => $product){
            $results[] = array("product_id" => $request->product_id[$key],
                "quantity" => $request->quantity[$key], "price" => $request->price[$key]);
        }

        $newPurchase->purchaseDetails()->createMany($results);

        return redirect()->route('purchases.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        $subtotal = 0;
        $purchaseDetails = $purchase->purchaseDetails;
        foreach ($purchaseDetails as $purchaseDetail){
            $subtotal += $purchaseDetail->quantity * $purchaseDetail->price;
        }
        return view('admin.purchase.show', compact('purchase', 'purchaseDetails', 'subtotal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
//        $providers = Provider::all();
//        return view('admin.purchase.edit', compact('purchase', 'providers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePurchaseRequest  $request
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePurchaseRequest $request, Purchase $purchase)
    {
//        $purchase->update($request->all());
//        return redirect()->route('purchases.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
//        $purchase->delete();
//        return redirect()->route('purchases.index');
    }

    public function pdf(Purchase $purchase)
    {
        $subtotal = 0;
        $purchaseDetails = $purchase->purchaseDetails;
        foreach ($purchaseDetails as $purchaseDetail){
            $subtotal += $purchaseDetail->quantity * $purchaseDetail->price;
        }
//    return view('admin.purchase.pdf', compact('purchase', 'subtotal', 'purchaseDetails'));
        $pdf = Pdf::loadView('admin.purchase.pdf', compact('purchase', 'subtotal', 'purchaseDetails'));
        return $pdf->stream('Reporte_de_Compra_'.$purchase->id.'.pdf');
    }

    public function upload(Request $request, Purchase $purchase){
        $filename = "";
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $destinationPath = 'images/';
            $filename = time() . "-" . $file->getClientOriginalName();
            $uploadSuccess = $request->file('image')->move($destinationPath, $filename);
        }

        $purchase->update(['picture' => $filename]);
        return redirect()->route('purchases.index');
    }
    public function change_status(Purchase $purchase){
        if ($purchase->status == 'VALID'){
            $purchase->status = 'CANCELED';
            $purchase->save();
            return redirect()->back();
        }
        else{
            $purchase->status = 'VALID';
            $purchase->save();
        }
        return redirect()->back();
    }
}
