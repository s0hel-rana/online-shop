<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SubCategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    protected static function boot(){
        parent::boot();
        static::created(function($subCategory){
            $subCategory->slug = $subCategory->createSlug($subCategory->name);
            $subCategory->save();
        });
    }

    private function createSlug($name){
        if(static::whereSlug($slug = Str::slug($name))->exists()){
    
            $max = static::whereName($name)->latest('id')->skip(1)->value('slug');
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
