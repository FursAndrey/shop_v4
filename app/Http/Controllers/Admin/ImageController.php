<?php

namespace App\Http\Controllers\Admin;

use App\Actions\ImageActions\DeleteAllImagesAction;
use App\Actions\ImageActions\DeleteOneImageAction;
use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Product;

class ImageController extends Controller
{
    public function destroyAll(Product $product)
    {
        $this->authorize('delete-image', Image::class);

        (new DeleteAllImagesAction)($product);
        return redirect()->route('product.show', $product)->with('success','All images have been deleted successfully');
    }

    public function destroyOne(Product $product, Image $image)
    {
        $this->authorize('delete-image', Image::class);
        
        (new DeleteOneImageAction)($image);
        return redirect()->route('product.show', $product)->with('success','Image has been deleted successfully');
    }
}
