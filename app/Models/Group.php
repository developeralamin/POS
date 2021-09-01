<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
       use HasFactory;
        protected $fillable = ['title']; 

  public function users()
  {
    return $this->hasMany(User::class);
  }
  
	  /**
	   ** Getting array for select option
	  **/
      public static function arrayforSelectGroup(){
      	$arr = [];
      	$groups = Group::all();
        foreach ($groups as $group) {
           $arr[$group->id] = $group->title;
        }

        return $arr;
      }
}
