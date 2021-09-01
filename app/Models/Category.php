<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable =['title'];

//Use for foreign key 
//Use for foreign key 
 public function product()
  {
    return $this->hasMany(Product::class);
  }

  
    /**
	   ** Getting array for select option
	  **/
      public static function arrayforSelectGroup(){
      	$arr = [];
      	$categories = Category::all();
        foreach ($categories as $category) {
           $arr[$category->id] = $category->title;
        }

        return $arr;
      }
}
