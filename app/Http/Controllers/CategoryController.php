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
        $categories = Category::paginate(10);
        return view('admin_panel.categories', compact('categories'));
    }

    /**
     * Display view for adding new category.
     *
     * @param  array  $data
     * @return \App\Models\Category
     */
    public function addCategoryView()
    {
        return view('admin_panel.add_category');
    }

    /**
     * Get all categories (for select options - subcategories).
     *
     * @param  array  $data
     * @return \App\Models\Category
     */
    public function getAllSub()
    {
        $categories = Category::all();
        return view('admin_panel.add_subcategory', compact('categories'));
    }

    /**
     * Display all categories for menu.
     *
     * @param  array  $data
     * @return \App\Models\Category
     */
    public function categoryMenu()
    {
        $categories = Category::all();
        return view('furniture', compact('categories'));
    }

    /**
     * Display all categories (furniture).
     *
     * @param  array  $data
     * @return \App\Models\Product
     */
    public function allCategories()
    {
        $categories = Category::get('name');
        return view('furniture', compact('categories'));
    }

    /**
     * Display specified category
     *
     * @param  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $category = Category::where('id', $id)->first();

        return $category;
    }

    /**
     * Edit specific category.
     *
     * @param  Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function edit(Request $request, $id)
    {
        $category = Category::find($id);

        $category->name = $request->name;
        $category->save();

        $this->index();
        return redirect('admin_panel/categories');
    }

    /**
     * Remove the specified category.
     *
     * @param  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $category = Category::find($id);
        $category->destroy($id);

        $this->index();
        return redirect('admin_panel/categories');
    }
}
