<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    /**
     * Display all subcategories.
     *
     * @param  array  $data
     * @return \App\Models\Subcategory
     */
    public function index()
    {
        $subcategories = Subcategory::all();
        return view('admin_panel.subcategories', compact('subcategories'));
    }

    /**
     * Get all subcategories with categories.
     *
     * @param  array  $data
     * @return \App\Models\Subcategory
     */
    public function getAll()
    {
        //$subcategories = Subcategory::all();
        $subcategories = DB::table('subcategories')
            ->join('categories', 'subcategories.category_id', '=', 'categories.id')
            ->select('subcategories.id', 'subcategories.name', 'categories.id as categoryID', 'categories.name as categoryName')
            ->get();
        return view('admin_panel.add_product', compact('subcategories'));
    }
}
