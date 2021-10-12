<?php

namespace App\Services;

use App\Models\Category;

class CategoryServices
{
    /**
     * Create new category.
     */
    public function create($data)
    {
        $category = new Category();
        $category->name = $data->name;
        $category->save();

        return $category;
    }
}
