<?php

namespace App\Http\Controllers\Admin;

use App\Actions\DeleteAllImagesAction;
use App\Actions\DeleteOneImageAction;
use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Product;

class ImageController extends Controller
{
    public function destroyAll(Product $product)
    {
        (new DeleteAllImagesAction)($product);
        return redirect()->route('product.show', $product)->with('success','All images have been deleted successfully');
    }

    public function destroyOne(Product $product, Image $image)
    {
        (new DeleteOneImageAction)($image);
        return redirect()->route('product.show', $product)->with('success','Image has been deleted successfully');
    }
}
