<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Subcategory;
use App\Http\Requests\CreateSubcategory;
use App\Services\SubcategoryServices;

class SubcategoryController extends Controller
{
    protected $subcategoryServices;

    public function __construct(SubcategoryServices $subcategoryServices)
    {
        $this->subcategoryServices = $subcategoryServices;
    }

    /**
     * Create a new subcategory.
     */
    public function store(CreateSubcategory $request)
    {
        if ($request->validated()) {
            $result = $this->subcategoryServices->create($request);
            return redirect('/admin_panel/subcategories');
        }
    }

    /**
     * Display all subcategories.
     */
    public function index()
    {
        $subcategories = Subcategory::paginate(15);
        return view('admin_panel.subcategories', compact('subcategories'));
    }

    /**
     * Get all subcategories with categories.
     */
    public function getAll()
    {
        $subcategories = DB::table('subcategories')
            ->join('categories', 'subcategories.category_id', '=', 'categories.id')
            ->select('subcategories.id', 'subcategories.name', 'categories.id as categoryID', 'categories.name as categoryName')
            ->get();
        return view('admin_panel.add_product', compact('subcategories'));
    }

    /**
     * Display specified subcategory
     */
    public function show($id)
    {
        $subcategory = Subcategory::where('id', $id)->first();

        return $subcategory;
    }

    /**
     * Edit specific subcategory.
     */
    public function edit(Request $request, $id)
    {
        $subcategory = Subcategory::find($id);

        $subcategory->name = $request->name;
        $subcategory->save();

        $this->index();
        return redirect('admin_panel/subcategories');
    }

    /**
     * Remove the specified subcategory.
     */
    public function delete($id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->destroy($id);

        $this->index();
        return redirect('admin_panel/subcategories');
    }
}
