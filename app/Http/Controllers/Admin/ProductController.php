<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (\request()->ajax()) {
            $products = Product::latest();
            return DataTables::of($products)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('admin.product.action', compact('row'));
                })
                ->addColumn('created_at', function ($row) {
                    return view('admin.common.created_at',compact('row'));
                })
                ->rawColumns(['action','created_at'])
                ->make(true);
        }
        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $brands = Brand::all();
        return view('admin.product.create',compact('categories','subCategories','brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validated();
        DB::beginTransaction();
        try {
            Product::create($validated);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->info('Something went wrong!');
            return back();
        }
        toastr()->success('Data has been saved successfully!');
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $subCategories = SubCategory::all();
        $brands = Brand::all();
        return view('admin.product.edit',compact('product','categories','subCategories','brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validated();
        DB::beginTransaction();
        try {
            $product = Product::findOrFail($id);
            $product->update($validated);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->info('Something went wrong!');
            return back();
        }
        toastr()->success('Data Updated Successfully!');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            Product::findOrFail(decrypt($id))->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->info('Something went wrong!');
            return back();
        }      
        toastr()->success('Data Daleted Successfully!');
        return redirect()->route('products.index');
    }
}
