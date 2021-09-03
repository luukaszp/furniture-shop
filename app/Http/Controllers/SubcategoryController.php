<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subcategory;

class SubcategoryController extends Controller
{
    /**
     * Create a new subcategory.
     *
     * @param  array  $data
     * @return \App\Models\Subcategory
     */
    protected function store(Request $request)
    {
        $subcategory = new Subcategory();
        $subcategory->name = $request->name;
        $subcategory->category_id = $request->category;
        $subcategory->save();

        return redirect('/admin_panel/subcategories');
    }
}
