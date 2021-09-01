<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\PurchasesItem;
use App\Models\PurchasesInvoice;
use App\Models\SaleItem;
use App\Models\SaleInvoice;
use App\Http\Requests\InvoiceRequest;
use App\Http\Requests\InvoiceProductRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class UserPurchasesController extends Controller
{
    public function index($id)
    {
       $this->data['user'] 	   = User::findOrFail($id);
    	return view('users.purchases.purchases', $this->data);	
    }
    
    public function __construct(){
       parent::__construct();
    	$this->data['tab_menu'] = 'purchase';
    }

  public function createinvoice(InvoiceRequest $request, $user_id)
  
  {
  	   $formdata                 = $request->all();
  	  $formdata['user_id']      = $user_id;
  	  $formdata['admin_id']     = Auth::id();

  	  $invoice = PurchasesInvoice::create($formdata);
  	  	

  	  return redirect()->route('user.purchase.invoice_details',['id'=> $user_id,'invoice_id'=> $invoice->id]);
  }
  




	 public function detialsinvoice($user_id,$invoice_id)
	 {
       
	 	 $this->data['user']           =  User::findOrFail($user_id);
	 	 $this->data['invoice']        =  PurchasesInvoice::findOrFail($invoice_id);
         $this->data['products']       =  Product::arrayforSelectGroup();
  
	 	 return view('users.purchases.invoice',$this->data);
	 }




  public function additem(InvoiceProductRequest $request , $user_id , $invoice_id)
    {
      

       $formdata = $request->all();
       $formdata['purchases_invoice_id'] = $invoice_id;

      if(PurchasesItem::create($formdata)){
        Session::flash('message','Item Added Successfully');
      }

      return redirect()->route('user.purchase.invoice_details',['id'=> $user_id,'invoice_id'=> $invoice_id]);


    }
  



  public function destroyItem( $user_id , $invoice_id , $item_id)
  {
      if(PurchasesItem::destroy($item_id)){
        Session::flash('message','Item Delete Successfully');
      }
      return redirect()->route('user.purchase.invoice_details',['id'=> $user_id,'invoice_id'=> $invoice_id]);
  }


   public function destroy($user_id , $invoice_id)
   {
      if(PurchasesInvoice::destroy($invoice_id)){
        Session::flash('message','Invoice Deleted Successfully');
      }
      return redirect()->route('user.purchases',['id'=> $user_id]);
   }









}
