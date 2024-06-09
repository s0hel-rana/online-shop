<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        if (\request()->ajax()) {
            $subCategories = SubCategory::with('category')->latest();
            return DataTables::of($subCategories)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('admin.sub_category.action', compact('row'));
                })
                ->addColumn('created_at', function ($row) {
                    return view('admin.common.created_at',compact('row'));
                })
                ->rawColumns(['action','created_at'])
                ->make(true);
        }
        return view('admin.sub_category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
        ]);
        DB::beginTransaction();
        try {
           SubCategory::create($validated);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->info('Something went wrong!');
            return back();
        }
        toastr()->success('Data has been saved successfully!');
        return redirect()->route('sub-categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subCategory = SubCategory::findOrFail(decrypt($id));
        return view('admin.sub_category.index', compact('subCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validated();
        DB::beginTransaction();
        try {
            $subCategory = SubCategory::findOrFail($id);
            $subCategory->update($validated);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->info('Something went wrong!');
            return back();
        }
        toastr()->success('Data Updated Successfully!');
        return redirect()->route('sub-categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            SubCategory::findOrFail(decrypt($id))->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->info('Something went wrong!');
            return back();
        }      
        toastr()->success('Data Daleted Successfully!');
        return redirect()->route('sub-categories.index');
    }
}
