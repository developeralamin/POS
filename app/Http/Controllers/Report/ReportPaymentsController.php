<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;

class ReportPaymentsController extends Controller
{

  public function __construct()
   {
      parent::__construct();
    $this->data['main_menu']  = 'Reports';
    $this->data['sub_menu']   = 'Payments';

   }


    public function index(Request $request)
    {
     $this->data['start_date']  = $request->get('start_date', date('Y-m-d'));
     $this->data ['end_date']   = $request->get('end_date', date('Y-m-d'));


    $this->data['payments']=Payment::whereBetween('payments.date',[$this->data['start_date'],$this->data['end_date'] ])
          ->get();

      return view('reports.payments',$this->data);
    }
}
