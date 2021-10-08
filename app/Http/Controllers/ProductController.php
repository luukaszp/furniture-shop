<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Rating;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use App\Models\Subcategory;
use Cart;
use App\Services\ProductServices;
use App\Http\Requests\StoreProduct;
use App\Http\Requests\EditProduct;

class ProductController extends Controller
{
    protected $productServices;

    public function __construct(ProductServices $productServices)
    {
        $this->productServices = $productServices;
    }

    /**
     * Store a newly created product.
     */
    public function store(StoreProduct $request)
    {
        if ($request->validated()) {
            $result = $this->productServices->store($request);
            return redirect('/admin_panel/products');
        }
    }

    /**
     * Edit info about specific product.
     */
    public function edit(EditProduct $request, $id)
    {
        if ($request->validated()) {
            $result = $this->productServices->edit($request, $id);
            return redirect('/admin_panel/products');
        }
    }

    /**
     * Display all products (admin panel - table).
     */
    public function index()
    {
        $products = DB::table('products')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->join('subcategories', 'products.subcategory_id', '=', 'subcategories.id')
        ->select('products.*', 'subcategories.name as subcategoryName', 'categories.name as categoryName')->paginate(5);
        return view('admin_panel.products', compact('products'));
    }

    /**
     * Display all products (main page).
     */
    public function mainDisplay()
    {
        $products = Product::select('id', 'name', 'photo', 'price')->paginate(9);
        return view('main', compact('products'));
    }

    /**
     * Display product by id
     */
    public function showProduct($id)
    {
        $products = Product::where('id', $id)->get();
        $cart = Cart::content();
        $ratings = Rating::with('users:id,name,surname')->where('product_id', $id)->get();

        return view('product', compact('products', 'cart', 'ratings'));
    }

    /**
     * Display product by category
     */
    public function productByCategory(Request $request, Category $categoryName)
    {
        $categoryName =  $request->route()->parameters();
        $categoryID = Category::where('name', $categoryName)->pluck('id');
        $products = Product::where('category_id', $categoryID)->get();
        return view('furniture', compact('products'));
    }

    /**
     * Display specified product
     */
    public function show($id)
    {
        $product = Product::where('id', $id)->first();

        return $product;
    }

    /**
     * Remove the specified product.
     */
    public function delete($id)
    {
        $product = Product::find($id);
        $product->destroy($id);

        $this->index();
        return redirect('admin_panel/products');
    }
}
