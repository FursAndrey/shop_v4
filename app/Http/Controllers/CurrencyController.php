<?php

namespace App\Http\Controllers;

use App\Http\Requests\CurrencyRequest;
use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currencies = Currency::orderBy('code', 'ASC')->paginate(10);
        return view('shop.admin.currency.index', compact('currencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shop.admin.currency.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CurrencyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CurrencyRequest $request)
    {
        Currency::create($request->validated());
        return redirect()->route('currency.index')->with('success','Currency has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function show(Currency $currency)
    {
        return view('shop.admin.currency.show', compact('currency'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function edit(Currency $currency)
    {
        return view('shop.admin.currency.edit', compact('currency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\CurrencyRequest  $request
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function update(CurrencyRequest $request, Currency $currency)
    {
        $currency->fill($request->validated())->save();
        return redirect()->route('currency.index')->with('success','Currency Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Currency $currency)
    {
        $currency->delete();
        return redirect()->route('currency.index')->with('success','Currency has been deleted successfully');
    }
}
