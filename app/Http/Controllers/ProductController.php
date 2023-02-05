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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $providers = Provider::all();
        return view('admin.product.create', compact('categories', 'providers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreProductRequest $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $providers = Provider::all();
        return view('admin.product.edit', compact('product', 'categories', 'providers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateProductRequest $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
