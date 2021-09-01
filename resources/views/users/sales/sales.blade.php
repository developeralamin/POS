@extends('users.user_layout')

@section('user_content')


   <div class="card shadow mb-4">

      <div class="card-header py-3">
          
      </div>

<div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Sales of <strong>{{ $user->name }}</strong></h6>
        </div>
  <div class="card-body">
      <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               <thead>
                    <tr>
                      <th>Challen No</th>
                      <th>Customer</th>
                      <th>Date</th>
                      <th>Total</th>
                      <th>Items</th>
                      <th class="text-right">Actions</th>                       
                 </tr>
              </thead>
                                       
                                       
      <tbody>
           <?php 
            $grandTotal = 0;
            $totalItem = 0;

           ?>

    @foreach($user->sales as $sale)
       <tr>
          <td>{{ $sale->challan_no }}</td>
          <td>{{ $user->name}}</td>
          <td>{{ $sale->date }}</td>
          <td>
         <?php 

            $total = $sale->items()->sum('total');
            $grandTotal +=$total;
            echo $total;
         ?>
          </td>

          <td>

          <?php 
            $totalQty =$sale->items()->sum('quantity');
            $totalItem +=$totalQty;
            echo $totalQty;
         ?>
          </td>

          <td class="text-right">

<form method='post' action="{{ route('user.sales.destroy',
     ['id'=> $user->id,'invoice_id'=>$sale->id]) }}">

   <a href="{{ route('user.sales.invoice_details',['id'=> $user->id,'invoice_id'=>$sale->id]) }}"class="btn btn-info">
      <i class="fa fa-eye"></i>
     </a> 

    @if($totalQty == 0)
      @csrf
      @method('DELETE')               
     <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger"> <i class="fa fa-trash"></i>
     </button>   
    @endif

  </form>
                                           
   </td>
  </tr>
 @endforeach

       </tbody>
        <tfoot>
            <tr>
              <th>Challen No</th>
              <th>Customer</th>
              <th>Date</th>
              <th>{{ $grandTotal }}</th>
              <th>{{ $totalItem }}</th>
              <th class="text-right">Actions</th>
            </tr>
      </tfoot>
   </table>
   </div>
  </div>
 </div>


 </div>

@stop