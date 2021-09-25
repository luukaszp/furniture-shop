<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    /**
     * Store product inside shopping cart.
     *
     * @param  Request $request
     */
    public function store(Request $request)
    {
        $productID = $request->input('product_id');
        $products = Product::findOrFail($productID);
        $quantity = $request->input('quantity');

        $cart = Cart::add(
            $products->id,
            $products->name,
            $quantity,
            $products->price,
            $products->weight,
            ['color' => $products->color, 'size' => $products->size, 'photo' => $products->photo],
        );

        $products = Product::where('id', $productID)->get();

        return redirect()->route('product.index', $productID)->with('message', 'Pomyślnie dodano do koszyka!');
    }

    /**
     * Display content of shopping cart
     *
     * @param  array  $data
     * @return \App\Models\Product
     */
    public function show()
    {
        $carts = Cart::content();
        $subtotal = Cart::subtotal(2, '.', '');
        return view('shopping_cart', compact('carts', 'subtotal'));
    }

    /**
     * Update specific content of shopping cart
     *
     * @param  array  $data
     * @return \App\Models\Product
     */
    public function update(Request $request)
    {
        Cart::update($request->id, $request->quantity);
        return redirect()->route('cart.show');
    }

    /**
     * Delete specific content of shopping cart
     *
     * @param  array  $data
     * @return \App\Models\Product
     */
    public function delete(Request $request)
    {
        Cart::remove($request->id);
        return redirect()->route('cart.show');
    }

    /**
     * Delete all content of shopping cart
     *
     * @param  array  $data
     * @return \App\Models\Product
     */
    public function destroy()
    {
        Cart::destroy();
        return redirect()->route('cart.show');
    }

    /**
     * Get weight of all the content of shopping cart
     *
     * @param  array  $data
     * @return \App\Models\Product
     */
    public function getWeight()
    {
        Cart::weight();
        return redirect()->route('cart.show');
    }
}
