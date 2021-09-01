@extends('users.user_layout')

@section('user_content')
@section('card_user')

<div class="row" style="padding-top:-50px; padding-bottom:15px;">

<div class="col-xl-2 col-md-3 mb-3">
  <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
              Total Sales
          </div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">
            <?php 
            $totalSales =0;

            foreach ($user->sales as $sale) {
                $totalSales +=$sale->items()->sum('total');
            }
            echo $totalSales;

            ?>

          </div>
          </div>
            <div class="col-auto">
               <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
        </div>
      </div>
  </div>
</div>


<div class="col-xl-2 col-md-3 mb-4">
  <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
              Total Purchase
          </div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">
            
            <?php 
            $totalPurchase = 0;

            foreach ($user->purchases as $purchase) {
                $totalPurchase +=$purchase->items()->sum('total');
            }
            echo $totalPurchase;

            ?>

          </div>
          </div>
            <div class="col-auto">
               <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
        </div>
      </div>
  </div>
</div>

<div class="col-xl-2 col-md-3 mb-3">
  <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                 Total Receipts
          </div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalReceipt =$user->receipts()->sum('amount') }}</div>
          </div>
            <div class="col-auto">
               <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
        </div>
      </div>
  </div>
</div>


<div class="col-xl-2 col-md-3 mb-3">
  <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
            Total Payment
          </div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPayment=$user->payments()->sum('amount') }}</div>
          </div>
            <div class="col-auto">
               <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
        </div>
      </div>
  </div>
</div>

 <?php
  $totalBalance =($totalPurchase + $totalReceipt) - ($totalSales + $totalPayment);

 ?>


<div class="col-xl-2 col-md-3 mb-3">
  <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
            Balance
          </div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">

            @if($totalBalance > 0)

            {{ $totalBalance }}
            
            @else
              0
             @endif
         </div>
          </div>
            <div class="col-auto">
               <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
        </div>
      </div>
  </div>
</div>


<div class="col-xl-2 col-md-3 mb-3">
  <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
            Due
          </div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">

          @if($totalBalance < 0)
          {{ $totalBalance }}
          
          @else
             0

           @endif


          </div>
          </div>
            <div class="col-auto">
               <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
        </div>
      </div>
  </div>
</div>

</div>

@stop 






   <div class="card shadow mb-4">

      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">User <strong>{{ $user->name }}'s</strong> Information</h6>
      </div>

  <div class="card-body user_show">

      <div class="row justify-content-md-center">
        <div class="col-md-8">
          <table class="table table-borderless table-striped table-hover mt-4">

              <tr>
                <th class="text-right">Group : </th>
                <td>{{ $user->group->title }}</td>
              </tr>

              <tr>
                <th class="text-right">Name : </th>
                <td>{{ $user->name }}</td>
              </tr>

              <tr>
                <th class="text-right">Email : </th>
                <td>{{ $user->email }}</td>
              </tr>

              <tr>
                <th class="text-right">Phone : </th>
                <td>{{ $user->phone }}</td>
              </tr>

              <tr>
                <th class="text-right">Address : </th>
                <td>{{ $user->address }}</td>
              </tr>

          </table>
        </div>
      </div>
   </div>


 </div>



@stop