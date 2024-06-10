<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'],function(){
    Route::group(['middleware'=>'admin.guest'],function(){
        Route::get('login',[AdminController::class,'index'])->name('admin.login');
        Route::post('authenticate',[AdminController::class,'authenticate'])->name('admin.authenticate');
    });

    Route::group(['middleware'=>'admin.auth'],function(){
        Route::get('dashboard',[HomeController::class,'index'])->name('admin.dashboard');
        Route::get('logout',[HomeController::class,'logout'])->name('admin.logout');
        Route::resource('categories','App\Http\Controllers\Admin\CategoryController');
        Route::resource('sub-categories','App\Http\Controllers\Admin\SubCategoryController');
        Route::resource('brands','App\Http\Controllers\Admin\BrandController');
        Route::resource('products','App\Http\Controllers\Admin\ProductController');
    });

});
