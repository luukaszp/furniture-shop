<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Subcategory;
use Intervention\Image\Facades\Image;
use AWS;

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
            $uploadedImage = $data->file('photo');
            $imageName = time() . '.' . $uploadedImage->getClientOriginalExtension();
            $destinationPath = public_path('images/products/');
            $uploadedImage->move($destinationPath, $imageName);
            $imagePath = $destinationPath . $imageName;

            /* $uploadedImage = $data->file('photo');
            $extension = $data->file('photo')->getClientOriginalExtension();

            $imageName = time() . '.' . $uploadedImage->getClientOriginalExtension();

            $fit = Image::make($uploadedImage)->fit(300, 450)->encode($extension);
            $destinationPath = public_path('images/products/');
            $uploadedImage->move($destinationPath, $imageName);
            $imagePath = $destinationPath . $imageName; */

            $s3 = AWS::createClient('s3');
            $s3->putObject(array(
                'Bucket'     => 'furniture-shop-web',
                'Key'        => $imageName,
                'SourceFile' => $imagePath,
                'ACL'        => 'public-read',
            ));

            $product->photo = $imageName;
        }
        $product->save();

        return $product;
    }

    /**
     * Edit info about specific product.
     */
    public function edit($data, $id)
    {
        $product = Product::find($id);
        $product->name = $data->get('name');

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
