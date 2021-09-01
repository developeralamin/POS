<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\PaymentRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;

class UserPaymentsController extends Controller
{
	 public function __construct(){
     parent::__construct();
    	$this->data['tab_menu'] = 'payments';
    }

   public function index($id)
    {
       $this->data['user'] 	   = User::findOrFail($id);
    	return view('users.payments.payments', $this->data);	
    }
    

   public function store(PaymentRequest $request, $user_id , $invoice_id = null)
   {
        $formdata                = $request->all();
        $formdata['user_id']     = $user_id;
        $formdata['admin_id']     = Auth::id();


        if($invoice_id){ 
           $formdata['purchases_invoice_id'] = $invoice_id;
        }
         if(Payment::create($formdata)){
            Session::flash('message', 'Payment Added Successfully');
        }

    if($invoice_id){

      return redirect()->route('user.purchase.invoice_details',['id'=> $user_id,
        'invoice_id'=> $invoice_id]);
    }else{
      return redirect()->route('users.show',['user' => $user_id]);
    }

        
   }

   

   public function destroy($user_id , $payment_id)
   {
   	   if(Payment::destroy($payment_id)){

   	   	Session::flash('message', 'Payment Delete Successfully');

   	   }
   	    return redirect()->route('user.payments',['id' => $user_id]);
   }

}
