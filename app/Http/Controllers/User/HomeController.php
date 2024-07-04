<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $featuredProduct = Product::where('is_featured', 'yes')->where('status', 'active')->orderBy('id', 'desc')->get();
        $latestProduct = Product::where('status', 'active')->orderBy('id', 'asc')->take(8)->get();
        return view('user.home',compact('featuredProduct','latestProduct'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $product = Product::where('slug', $slug)->first();
        $relatedProduct = Product::where('status', 'active')->orderBy('id', 'asc')->take(8)->get();
        return view('user.product_details',compact('product','relatedProduct'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
