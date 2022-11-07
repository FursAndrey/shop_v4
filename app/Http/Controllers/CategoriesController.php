<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::paginate(10);
        return view('shop.admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shop.admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        Categories::create($request->validated());
        return redirect()->route('category.index')->with('success','Category has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(Categories $category)
    {
        return view('shop.admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit(Categories $category)
    {
        return view('shop.admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\CategoryRequest  $request
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Categories $category)
    {
        $category->fill($request->validated())->save();
        return redirect()->route('category.index')->with('success','Category Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categories $category)
    {
        $category->delete();
        return redirect()->route('category.index')->with('success','Сategory has been deleted successfully');
    }
}
