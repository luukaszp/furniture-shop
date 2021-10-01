<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Product;

class RatingController extends Controller
{
    /**
     * Display ratings for specified product
     */
    public function show($id)
    {
        $rating = Rating::where('id', $id)->first();

        return $rating;
    }

    /**
     * Store a newly created rating.
     */
    public function addRating(Request $request)
    {
        $rating = new Rating();
        $rating->rate = $request->rate;
        $rating->opinion = $request->opinion;
        $rating->product_id = $request->product_id;
        $rating->user_id = auth()->user()->id;
        $rating->save();

        return redirect('product/' . $request->product_id);
    }

    /**
     * Edit specific rating/opinion.
     */
    public function edit(Request $request, $id)
    {
        $rating = Rating::find($id);

        $rating->opinion = $request->opinion;
        $rating->rate = $request->rate;
        $rating->save();

        return redirect('product/' . $request->product_id);
    }

    /**
     * Remove the specified rating.
     */
    public function delete(Request $request, $id)
    {
        $rating = Rating::find($id);
        $rating->destroy($id);

        return redirect('product/' . $request->product_id);
    }
}
