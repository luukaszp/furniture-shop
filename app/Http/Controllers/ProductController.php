<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Store a newly created product.
     *
     * @param  Request $request
     */
    public function store(StoreProduct $request)
    {
        $product = new Product();
        $product->name = $request->get('name');
        $product->category_id = $request->get('category');
        $product->subcategory_id = $request->get('subcategory');
        $product->price = $request->get('price');
        $product->color = $request->get('color');
        $product->amount = $request->get('amount');
        $product->size = $request->get('size');
        $product->code_product = $request->get('code_product');
        $product->weight = $request->get('weight');

        if ($file = $request->hasFile('photo')) {
            $product->photo = $imagePath = $request->file('photo')->store('products', 'public');

            $photo = Image::make(public_path("storage/{$imagePath}"))->fit(300, 450);
            $photo->save();

            $imageArray = ['photo' => $imagePath];
        }

        $product->save();

        return redirect('/admin_panel/products');
    }
}
