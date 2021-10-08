<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Subcategory;
use Intervention\Image\Facades\Image;

class ProductServices
{
    /**
     * Store a newly created product.
     */
    public function store($data)
    {
        $product = new Product();
        $product->name = $data->get('name');

        $subID = $data->get('subcategory');
        $categoryID = Subcategory::where('id', $subID)->pluck('category_id')->first();
        $product->subcategory_id = $subID;
        $product->category_id = $categoryID;

        $product->price = str_replace(",", ".", $data->get('price'));
        $product->color = $data->get('color');
        $product->amount = $data->get('amount');
        $product->size = $data->get('size');
        $product->code_product = $data->get('code_product');
        $product->weight = $data->get('weight');
        $product->description = $data->get('description');

        if ($data->file('photo')) {
            $product->photo = $imagePath = $data->file('photo')->store('products', 'public');

            $photo = Image::make(public_path("storage/{$imagePath}"))->fit(300, 450);
            $photo->save();

            $imageArray = ['photo' => $imagePath];
        }

        $product->save();

        return $product;
    }
}
