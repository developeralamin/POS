<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasesItem extends Model
{
    use HasFactory;

    protected $fillable =['product_id','purchases_invoice_id','price','quantity','total'];


  public function invoice()
  {
  	 return $this->belongsTo(PurchasesInvoice::class,'purchases_invoice_id','id');
  }

   public function product()
  {
  	 return $this->belongsTo(Product::class);
  }
}
