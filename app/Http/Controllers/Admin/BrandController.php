<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (\request()->ajax()) {
            $brands = Brand::latest();
            return DataTables::of($brands)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return view('admin.brand.action', compact('row'));
                })
                ->addColumn('created_at', function ($row) {
                    return view('admin.common.created_at',compact('row'));
                })
                ->rawColumns(['action','created_at'])
                ->make(true);
        }
        return view('admin.brand.index');
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
        ]);
        DB::beginTransaction();
        try {
           Brand::create($validated);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->info('Something went wrong!');
            return back();
        }
        toastr()->success('Data has been saved successfully!');
        return redirect()->route('brands.index');
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
        $brand = Brand::findOrFail(decrypt($id));
        return view('admin.brand.index', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validated();
        DB::beginTransaction();
        try {
            $brand = Brand::findOrFail($id);
            $brand->update($validated);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->info('Something went wrong!');
            return back();
        }
        toastr()->success('Data Updated Successfully!');
        return redirect()->route('brands.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            Brand::findOrFail(decrypt($id))->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->info('Something went wrong!');
            return back();
        }      
        toastr()->success('Data Daleted Successfully!');
        return redirect()->route('brands.index');
    }
}
