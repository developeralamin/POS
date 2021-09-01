<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SaleItem;
use App\Models\PurchasesItem;
use App\Models\Payment;
use App\Models\Receipt;
use Illuminate\Support\Facades\DB;



class UserReportsController extends Controller
{

	public function __construct(){
     parent::__construct();
    	$this->data['tab_menu'] = 'reports';
    }

    public function report($id)
    {
    	$this->data['user']  = User::findOrFail($id);



 $this->data['sales']=
 SaleItem::select( 'products.title', DB::raw( 'SUM(sale_items.quantity) as quantity, AVG(sale_items.price) AS price, SUM(sale_items.total) as total') )
           ->join('products','sale_items.product_id','=','products.id')
           ->join('sale_invoices','sale_items.sale_invoice_id','=','sale_invoices.id')
           ->where('products.has_stock', 1)
           ->where('sale_invoices.user_id',$id)
           ->groupBy(['products.id','products.title'])
           ->get();



 $this->data['purchases']=
   PurchasesItem::select( 'products.title', DB::raw( 'SUM(purchases_items.quantity) as quantity, AVG(purchases_items.price) AS price, SUM(purchases_items.total) as total') )

        ->join('products','purchases_items.product_id','=','products.id')
        ->join('purchases_invoices','purchases_items.purchases_invoice_id','=','purchases_invoices.id')
         ->where('products.has_stock', 1)
         ->where('purchases_invoices.user_id',$id)
         ->groupBy(['products.id','products.title'])
        ->get();          

$this->data['payments']=Payment::
        select(DB::raw('SUM(payments.amount) as amount'))           
        ->groupBy('date')
         ->where('user_id',$id)
          ->get();

$this->data['receipts']=Receipt::
        select(DB::raw('SUM(receipts.amount) as amount'))           
        ->groupBy('date')
         ->where('user_id',$id)
          ->get();


        return view('users.reports.reports',$this->data);
    }
}
