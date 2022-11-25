<?php

namespace App\Http\Controllers\Admin;

use App\Actions\SkuActions\DeleteSkuAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\SkuRequest;
use App\Models\Product;
use App\Models\Sku;

class SkuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skus = Sku::with(['options', 'product'])->paginate(15);
        return view('shop.admin.sku.index', compact('skus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::get();
        return view('shop.admin.sku.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\SkuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SkuRequest $request)
    {
        Sku::create($request->validated());
        return redirect()->route('sku.index')->with('success','Sku has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sku  $sku
     * @return \Illuminate\Http\Response
     */
    public function show(Sku $sku)
    {
        return view('shop.admin.sku.show', compact('sku'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sku  $sku
     * @return \Illuminate\Http\Response
     */
    public function edit(Sku $sku)
    {
        $products = Product::get();
        return view('shop.admin.sku.edit', compact('sku', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\SkuRequest  $request
     * @param  \App\Models\Sku  $sku
     * @return \Illuminate\Http\Response
     */
    public function update(SkuRequest $request, Sku $sku)
    {
        $sku->fill($request->validated())->save();
        $sku->options()->sync($request->option_id);
        return redirect()->route('sku.index')->with('success','Sku Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sku  $sku
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sku $sku)
    {
        (new DeleteSkuAction)($sku);

        return redirect()->route('sku.index')->with('success','Sku has been deleted successfully');
    }
}
