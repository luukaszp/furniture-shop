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
        $subcategories = Subcategory::paginate(15);
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

    /**
     * Display specified subcategory
     *
     * @param  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $subcategory = Subcategory::where('id', $id)->first();

        return $subcategory;
    }

    /**
     * Edit specific subcategory.
     *
     * @param  Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
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
     *
     * @param  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->destroy($id);

        $this->index();
        return redirect('admin_panel/subcategories');
    }
}
