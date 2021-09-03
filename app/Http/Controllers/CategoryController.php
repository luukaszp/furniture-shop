<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Create a new category.
     *
     * @param  array  $data
     * @return \App\Models\Category
     */
    protected function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect('/admin_panel/categories');
    }

    /**
     * Display all categories.
     *
     * @param  array  $data
     * @return \App\Models\Category
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin_panel.categories', compact('categories'));
    }
}