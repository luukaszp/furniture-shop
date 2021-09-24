<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Product;

class RatingController extends Controller
{
    /**
     * Display ratings for specified product
     *
     * @param  $id
     */
    public function show($id)
    {
        $rating = Rating::where('product_id', $id)->first();

        return $rating;
    }

    /**
     * Store a newly created rating.
     *
     * @param  Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function addRating(Request $request)
    {
        $rating = new Rating();
        $rating->rate = $request->rate;
        $rating->opinion = $request->opinion;
        $rating->product_id = $request->product_id;
        $rating->user_id = auth('api')->user()->id;
        $rating->save();

        return redirect('product/' . $request->product_id);
    }

    /**
     * Edit specific rating/opinion.
     *
     * @param  Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function edit(Request $request, $id)
    {
        $rating = Rating::find($id);

        $rating->opinion = $request->opinion;
        $rating->rate = $request->rate;
        $rating->save();

        return redirect('product/' . $request->product_id);
    }
}
