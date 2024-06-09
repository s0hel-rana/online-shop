<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (\request()->ajax()) {
            $categories = Category::latest();
            return DataTables::of($categories)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('admin.category.action', compact('row'));
                })
                ->addColumn('created_at', function ($row) {
                    return view('admin.common.created_at',compact('row'));
                })
                ->rawColumns(['action','created_at'])
                ->make(true);
        }
        return view('admin.category.index');
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
    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();
        DB::beginTransaction();
        try {
            $filename = null;
            if ($request->hasfile('image')) {
                $file = $request->file('image');
                $filename = date('Ymdmhs') . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('/upload'), $filename);
            }
            if(isset($validated['image'])){
                $validated['image'] = $filename ?? null;
            }

           Category::create($validated);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->info('Something went wrong!');
            return back();
        }
        toastr()->success('Data has been saved successfully!');
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::findOrFail(decrypt($id));
        return view('admin.category.index', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $validated = $request->validated();
        DB::beginTransaction();
        try {
            $category = Category::findOrFail($id);
            $category->update($validated);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->info('Something went wrong!');
            return back();
        }
        toastr()->success('Data Updated Successfully!');
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            Category::findOrFail(decrypt($id))->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->info('Something went wrong!');
            return back();
        }      
        toastr()->success('Data Daleted Successfully!');
        return redirect()->route('categories.index');
    }
}
