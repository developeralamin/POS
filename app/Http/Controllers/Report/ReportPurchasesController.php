<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PurchasesItem;

class ReportPurchasesController extends Controller
{

  public function __construct()
   {
      parent::__construct();
    $this->data['main_menu']  = 'Reports';
    $this->data['sub_menu']   = 'Purchases';

   }



    public function index(Request $request)
    {
       $this->data['start_date']  = $request->get('start_date', date('Y-M-D'));
       $this->data ['end_date']   = $request->get('end_date', date('Y-M-D'));
      
      $this->data['purchases']=
      PurchasesItem::select('purchases_items.quantity','purchases_items.price','purchases_items.total','products.title','purchases_invoices.challan_no','purchases_invoices.date')

        ->join('products','purchases_items.product_id','=','products.id')
        ->join('purchases_invoices','purchases_items.purchases_invoice_id','=','purchases_invoices.id')
         ->whereBetween('purchases_invoices.date',[$this->data['start_date'],$this->data['end_date'] ])

        ->get();

      return view('reports.purchases',$this->data);
      
    }
}
