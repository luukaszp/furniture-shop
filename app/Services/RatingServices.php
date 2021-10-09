<?php

namespace App\Services;

use App\Models\Rating;

class RatingServices
{
    /**
     * Create new rating.
     */
    public function create($data)
    {
        $rating = new Rating();
        $rating->rate = $data->rate;
        $rating->opinion = $data->opinion;
        $rating->product_id = $data->product_id;
        $rating->user_id = auth()->user()->id;
        $rating->save();

        return $rating;
    }

    /**
     * Edit specific rating/opinion.
     */
    public function edit($data, $id)
    {
        $rating = Rating::find($id);

        $rating->opinion = $data->opinion;
        if ($data->rate) {
            $rating->rate = $data->rate;
        }
        $rating->save();

        return $rating;
    }
}
