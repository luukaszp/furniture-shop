<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CreateCategory;
use App\Services\CategoryServices;

class CategoryController extends Controller
{
    protected $categoryServices;

    public function __construct(CategoryServices $categoryServices)
    {
        $this->categoryServices = $categoryServices;
    }

    /**
     * Create a new category.
     */
    protected function store(CreateCategory $request)
    {
        if ($request->validated()) {
            $result = $this->categoryServices->create($request);
            return redirect('/admin_panel/categories');
        }
    }

    /**
     * Display all categories.
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin_panel.categories', compact('categories'));
    }

    /**
     * Display view for adding new category.
     */
    public function addCategoryView()
    {
        return view('admin_panel.add_category');
    }

    /**
     * Get all categories (for select options - subcategories).
     */
    public function getAllSub()
    {
        $categories = Category::all();
        return view('admin_panel.add_subcategory', compact('categories'));
    }

    /**
     * Display all categories for menu.
     */
    public function categoryMenu()
    {
        $categories = Category::all();
        return view('furniture', compact('categories'));
    }

    /**
     * Display all categories (furniture).
     */
    public function allCategories()
    {
        $categories = Category::get('name');
        return view('furniture', compact('categories'));
    }

    /**
     * Display specified category
     */
    public function show($id)
    {
        $category = Category::where('id', $id)->first();

        return $category;
    }

    /**
     * Edit specific category.
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
     */
    public function delete($id)
    {
        $category = Category::find($id);
        $category->destroy($id);

        $this->index();
        return redirect('admin_panel/categories');
    }
}
