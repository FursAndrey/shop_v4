<?php

namespace App\Http\Controllers\Admin;

use App\Actions\ImageActions\DeleteImagesAction;
use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Product;

class ImageController extends Controller
{
    public function destroyAll(Product $product)
    {
        $this->authorize('delete-image', Image::class);

        DeleteImagesAction::all($product);
        return redirect()->route('product.show', $product)->with('success','All images have been deleted successfully');
    }

    public function destroyOne(Product $product, Image $image)
    {
        $this->authorize('delete-image', Image::class);
        
        DeleteImagesAction::one($image);
        return redirect()->route('product.show', $product)->with('success','Image has been deleted successfully');
    }
}
