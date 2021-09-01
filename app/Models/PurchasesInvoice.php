<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasesInvoice extends Model
{
    use HasFactory;

     protected $fillable = ['date','challan_no','note','user_id','admin_id'];

	  public function user()
	   {
	     return $this->belongsTo(Users::class);
	    }

    public function admin()
	   {
	     return $this->belongsTo(Admin::class);
	    }

	  public function items()
	  {
	  	 return $this->hasMany(PurchasesItem::class);
	  }

    public function payments()
    {
    	return $this->hasMany(Payment::class);
    }
}
