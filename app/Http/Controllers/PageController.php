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
    
    public function productPage(int $productId)
    {
        $product = Product::with(['images', 'skus', 'skus.options', 'skus.options.property'])->find($productId);
        return view('shop.productPage', compact('product'));
    }
}
