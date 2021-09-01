<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\SaleInvoice;
use App\Models\SaleItem;
use App\Http\Requests\InvoiceRequest;
use App\Http\Requests\InvoiceProductRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class UserSalesController extends Controller

{

   public function __construct(){
        parent::__construct();
       $this->data['tab_menu']    = 'sales';
   }
   
   public function index($id)
   {
    	$this->data['user'] 	   = User::findOrFail($id);
    	return view('users.sales.sales', $this->data);
   }



  public function createinvoice(InvoiceRequest $request, $user_id)
  
  {
  	  $formdata                 = $request->all();
  	  $formdata['user_id']      = $user_id;
  	  $formdata['admin_id']     = Auth::id();

  	  $invoice = SaleInvoice::create($formdata);
  	  	

  	  return redirect()->route('user.sales.invoice_details',['id'=> $user_id,'invoice_id'=> $invoice->id]);
  }
  




	 public function detialsinvoice($user_id,$invoice_id)
	 {
	 	 $this->data['user']           =  User::findOrFail($user_id);
	 	 $this->data['invoice']        =  SaleInvoice::findOrFail($invoice_id);
     $this->data['products']       =  Product::arrayforSelectGroup();
  
	 	 return view('users.sales.invoice',$this->data);
	 }




  public function additem(InvoiceProductRequest $request , $user_id , $invoice_id)
    {
       $formdata = $request->all();
       $formdata['sale_invoice_id'] = $invoice_id;

      if(SaleItem::create($formdata)){
        Session::flash('message','Item Added Successfully');
      }

      return redirect()->route('user.sales.invoice_details',['id'=> $user_id,'invoice_id'=> $invoice_id]);


    }
  



  public function destroyItem( $user_id , $invoice_id , $item_id)
  {
      if(SaleItem::destroy($item_id)){
        Session::flash('message','Item Delete Successfully');
      }
      return redirect()->route('user.sales.invoice_details',['id'=> $user_id,'invoice_id'=> $invoice_id]);
  }



   public function destroy($user_id , $invoice_id)
   {
      if(SaleInvoice::destroy($invoice_id)){
        Session::flash('message','Invoice Deleted Successfully');
      }
      return redirect()->route('user.sales',['id'=> $user_id]);
   }




}