<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduct;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use App\Models\Subcategory;
use Cart;

class ProductController extends Controller
{
    /**
     * Store a newly created product.
     *
     * @param  Request $request
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->get('name');

        $subID = $request->get('subcategory');
        $categoryID = Subcategory::where('id', $subID)->pluck('category_id')->first();
        $product->subcategory_id = $subID;
        $product->category_id = $categoryID;

        $product->price = $request->get('price');
        $product->color = $request->get('color');
        $product->amount = $request->get('amount');
        $product->size = $request->get('size');
        $product->code_product = $request->get('code_product');
        $product->weight = $request->get('weight');
        $product->description = $request->get('description');

        if ($request->file('photo')) {
            $product->photo = $imagePath = $request->file('photo')->store('products', 'public');

            $photo = Image::make(public_path("storage/{$imagePath}"))->fit(300, 450);
            $photo->save();

            $imageArray = ['photo' => $imagePath];
        }

        $product->save();

        return redirect('/admin_panel/products');
    }

    /**
     * Display all products (admin panel - table).
     *
     * @param  array  $data
     * @return \App\Models\Product
     */
    public function index()
    {
        //$products = Product::all();
        $products = DB::table('products')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->join('subcategories', 'products.subcategory_id', '=', 'subcategories.id')
        ->select('products.*', 'subcategories.name as subcategoryName', 'categories.name as categoryName')->paginate(10);
        return view('admin_panel.products', compact('products'));
    }

    /**
     * Display all products (main page).
     *
     * @param  array  $data
     * @return \App\Models\Product
     */
    public function mainDisplay()
    {
        $products = Product::select('id', 'name', 'photo', 'price')->paginate(9);
        return view('main', compact('products'));
    }

    /**
     * Display product by id
     *
     * @param  $id
     */
    public function showProduct($id)
    {
        $products = Product::where('id', $id)->get();
        $cart = Cart::content();

        return view('product', compact('products', 'cart'));
    }

    /**
     * Display product by category
     *
     * @param  $id
     */
    public function productByCategory(Request $request, Category $categoryName)
    {
        $categoryName =  $request->route()->parameters();
        $categoryID = Category::where('name', $categoryName)->pluck('id');
        $products = Product::where('category_id', $categoryID)->get();
        return view('furniture', compact('products'));
    }
}
