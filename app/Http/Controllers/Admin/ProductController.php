<?php

namespace App\Http\Controllers\Admin;

use App\Actions\ProductActions\CreateProductAction;
use App\Actions\ProductActions\DeleteProductAction;
use App\Actions\ProductActions\UpdateProductAction;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Property;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Product::class, 'product');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with(['properties', 'category', 'skus'])->paginate(10);
        return view('shop.admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        $properties = Property::get();
        return view('shop.admin.product.create', compact('categories', 'properties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request, CreateProductAction $createProductAction)
    {
        $createProductAction($request);

        return redirect()->route('product.index')->with('success','Product has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('shop.admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::get();
        $properties = Property::get();
        return view('shop.admin.product.edit', compact('product', 'categories', 'properties'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        (new UpdateProductAction)($request, $product);
        
        return redirect()->route('product.index')->with('success','Product Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        (new DeleteProductAction)($product);
        
        return redirect()->route('product.index')->with('success','Product has been deleted successfully');
    }
}
