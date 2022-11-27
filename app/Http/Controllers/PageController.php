<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PageController extends Controller
{
    public function productListPage(Category $category = null)
    {
        if (is_null($category)) {
            $productsQuery = Product::with(['images']);
        } else {
            $productsQuery = Product::with(['images'])->where('category_id', '=', $category->id);
        }
        $products = $productsQuery->paginate(8);

        return view('shop.productList', compact('products'));
    }
    
    public function productPage(int $productId)
    {
        $product = Product::with(['images', 'skus', 'skus.options', 'skus.options.property'])->find($productId);
        return view('shop.productPage', compact('product'));
    }
    
    public function setLocale($locale)
    {
        session(['locale' => $locale]);
        App::setLocale($locale);
        return redirect()->back();
    }
}
