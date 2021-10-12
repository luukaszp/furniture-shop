<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;
use App\Models\Product;
use App\Http\Requests\RatingRequest;
use App\Services\RatingServices;

class RatingController extends Controller
{
    protected $ratingServices;

    public function __construct(RatingServices $ratingServices)
    {
        $this->ratingServices = $ratingServices;
    }

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
    public function addRating(RatingRequest $request)
    {
        if ($request->validated()) {
            $result = $this->ratingServices->create($request);
            return redirect('product/' . $request->product_id);
        }
    }

    /**
     * Edit specific rating/opinion.
     */
    public function edit(RatingRequest $request, $id)
    {
        if ($request->validated()) {
            $result = $this->ratingServices->edit($request, $id);
            return redirect('product/' . $request->product_id);
        }
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
