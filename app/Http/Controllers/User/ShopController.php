<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $data = [
            'categories' => Category::orderBy('name','asc')->where('status','active')->get(),
            'brands' => Brand::orderBy('name','asc')->where('status','active')->get(),
            'products' => Product::orderBy('name','desc')->where('status','active')->get(),
        ];

        return view('user.shop',$data);
    }
}
