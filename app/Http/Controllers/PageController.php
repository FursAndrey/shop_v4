<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function productListPage(Category $category = null)
    {
        $products = Product::with(['images'])->paginate(8);

        return view('shop.productList', compact('products'));
    }
}
