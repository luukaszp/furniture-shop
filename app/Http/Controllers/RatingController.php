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
    public function showRating($id)
    {
        $rates = Rating::where('product_id', $id);
        $average = (float) $rates->avg('rate');
        $round = round($average, 1);
        $data = [
            'avg' => $round,
            'count' => $rates->count('rate')
        ];

        return $data;
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
        $this->validate(
            $request,
            [
                'rate' => 'required',
            ]
        );

        $product = Product::find($request->id);

        $rating = new Rating();
        $rating->rate = $request->rate;
        $rating->opinion = $request->opinion;
        $rating->product_id = $request->product_id;
        //$rating->user_id = auth()->user()->id;
        $rating->save();

        return $rating;
    }
}
