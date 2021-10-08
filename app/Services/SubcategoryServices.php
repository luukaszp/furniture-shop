<?php

namespace App\Services;

use App\Models\Subcategory;

class SubcategoryServices
{
    /**
     * Create new subcategory.
     */
    public function create($data)
    {
        $subcategory = new Subcategory();
        $subcategory->name = $data->name;
        $subcategory->category_id = $data->category;
        $subcategory->save();

        return $subcategory;
    }
}
