@extends('layout.main')

@section('main_content')

{{-- <h2>Welcome to Home page</h2> --}}
<div class="row">

<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                   Total Stock
                 </div>
           <div class="h5 mb-0 font-weight-bold text-gray-800">
           {{ $stocks }}
         </div>
          </div>
         <div class="col-auto">
            <i class="fas fa-product fa-2x text-gray-300"></i>
           </div>
        </div>
      </div>
    </div>
 </div>


  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                Total Product     
              </div>
           <div class="h5 mb-0 font-weight-bold text-gray-800">
           {{ $products }}</div>
          </div>
         <div class="col-auto">
            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
           </div>
        </div>
      </div>
    </div>
 </div>


  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                    Total Sale
                 </div>
           <div class="h5 mb-0 font-weight-bold text-gray-800">
           {{ $sale_items }}</div>
          </div>
         <div class="col-auto">
            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
           </div>
        </div>
      </div>
    </div>
 </div>


  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                     Total Purchase
                 </div>
           <div class="h5 mb-0 font-weight-bold text-gray-800">
           	{{  $purchase_items }}
          
          </div>
          </div>
         <div class="col-auto">
            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
           </div>
        </div>
      </div>
    </div>
 </div>



  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                    Total Receipt
                 </div>
           <div class="h5 mb-0 font-weight-bold text-gray-800">
            {{ $receipt }}
         </div>
          </div>
         <div class="col-auto">
            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
           </div>
        </div>
      </div>
    </div>
 </div>


  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                   Total Payment
                 </div>
           <div class="h5 mb-0 font-weight-bold text-gray-800">
           {{ $payment }}
         </div>
          </div>
         <div class="col-auto">
            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
           </div>
        </div>
      </div>
    </div>
 </div>


  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                    Total User
                </div>
           <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $users }}</div>
          </div>
         <div class="col-auto">
            <i class="fas fa-users fa-2x text-gray-300"></i>
           </div>
        </div>
      </div>
    </div>
 </div>
	
</div>

@stop