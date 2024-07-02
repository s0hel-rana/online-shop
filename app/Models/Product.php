<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function subCategory(){
        return $this->belongsTo(SubCategory::class);
    }
    public  function brand(){
        return $this->belongsTo(Brand::class);
    }

    protected static function boot(){
        parent::boot();
        static::created(function($product){
            $product->slug = $product->createSlug($product->title);
            $product->save();
        });
    }

    private function createSlug($title){
        if(static::whereSlug($slug = Str::slug($title))->exists()){
    
            $max = static::whereTitle($title)->latest('id')->skip(1)->value('slug');
            if(is_numeric($max[-1])){
                return preg_replace_callback('/(\d+)$/', function($matches){
                    return $matches[1] + 1;
                }, $max);
            }
            return "{$slug}-1";
            }
            return $slug;
    }
}
