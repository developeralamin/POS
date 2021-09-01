<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\SaleItem;
use App\Models\PurchasesItem;
use App\Models\Receipt;
use App\Models\Payment;

class DashboardController extends Controller
{

	public function __construct()
     {
        parent::__construct();
        $this->data['main_menu']  = 'Dashboard';
     }

    public function index()
    {
    	
    	$this->data['users']           = User::count('id');
    	$this->data['products']        = Product::count('id');
    	$this->data['sale_items']      = SaleItem::sum('total');
	    $this->data['purchase_items']  = PurchasesItem::sum('total');
	    $this->data['receipt']         = Receipt::sum('amount');
	    $this->data['payment']         = Payment::sum('amount');
	    $this->data['stocks']          = 
	    PurchasesItem::sum('quantity') - SaleItem::sum('quantity');

    	return view('dashboard',$this->data);
    }
}
