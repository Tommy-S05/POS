<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Provider;
use Illuminate\Database\Eloquent\Builder;

/**
 * @mixin Builder
 */
class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('can:products.index')->only(['index']);
        $this->middleware('can:products.create')->only(['create', 'store']);
        $this->middleware('can:products.show')->only(['show']);
        $this->middleware('can:products.edit')->only(['edit', 'update']);
        $this->middleware('can:products.destroy')->only(['destroy']);
        $this->middleware('can:products.change')->only(['change_status']);
    }
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }
    public function create()
    {
        $categories = Category::all();
        $providers = Provider::all();
        return view('admin.product.create', compact('categories', 'providers'));
    }
    public function store(StoreProductRequest $request)
    {
        $filename = "";
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $destinationPath = 'images/';
            $filename = time() . "-" . $file->getClientOriginalName();
            $uploadSuccess = $request->file('picture')->move($destinationPath, $filename);
//            $request->picture = $filename;
        }
//        $newProduct = new Product();
//        $newProduct->name =$request->name;
//        $newProduct->image =$request->image;
//        $newProduct->sell_price =$request->sell_price;
//        $newProduct->category_id =$request->category_id;
//        $newProduct->provider_id =$request->provider_id;
//        $newProduct->save();
        $newProduct = Product::create($request->all() + [
                'image' => $filename
            ]);
        $code = str_pad($newProduct->id, 4, '0', STR_PAD_LEFT);
        $newProduct->code = $code;
        $newProduct->save();
        return redirect()->route('products.index');
    }
    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }
    public function edit(Product $product)
    {
        $categories = Category::all();
        $providers = Provider::all();
        return view('admin.product.edit', compact('product', 'categories', 'providers'));
    }
    public function update(UpdateProductRequest $request, Product $product)
    {
        $filename = "";
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $destinationPath = 'images/';
            $filename = time() . "-" . $file->getClientOriginalName();
            $uploadSuccess = $request->file('picture')->move($destinationPath, $filename);
//            $request->picture = $filename;
//            $product->image = $request->image;
        }

//        $product->name = $request->name;
//        $product->sell_price = $request->sell_price;
//        $product->category_id = $request->category_id;
//        $product->provider_id = $request->provider_id;
//        $product->save();
        $product->update($request->all() + [
                'image' => $filename
            ]);
        return redirect()->route('products.index');
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
    public function change_status(Product $product){
        if ($product->status == 'ACTIVE'){
            $product->status = 'DEACTIVATE';
            $product->save();
            return redirect()->back();
        }
        else{
            $product->status = 'ACTIVE';
            $product->save();
        }
        return redirect()->back();
    }
}
