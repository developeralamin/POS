@extends('layout.main')

@section('main_content')
  <div class="row page-header">
     <div class="col-md-4">
      <h2>Purchase Reports</h2>
     </div>
     <div class="col-md-8">

        {!! Form::open(['route' => ['reports.purchases'],'method' => 'get']) !!}

          <div class="form-row align-items-center">
            <div class="col-auto">
              <label class="sr-only" for="inlineFormInput">Name</label>

              {{ Form::date('start_date',$start_date,['class '=>'form-control','required','id' => 'date','placeholder' => 'Date']) }}

            </div>

            <div class="col-auto">
              <label class="sr-only" for="inlineFormInputGroup"></label>
              <div class="input-group mb-2">
                <div class="input-group-prepend">
                </div>
              {{ Form::date('end_date',$end_date,['class '=>'form-control','required','id' => 'date','placeholder' => 'Date']) }}

              </div>
            </div>
          
            <div class="col-auto">
              <button type="submit" class="btn btn-primary mb-2">Submit</button>
            </div>
          </div>

        {!! Form::close() !!}

     </div>
      
  </div>



<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Purchases Reports From 
         <strong>{{ $start_date }}</strong> to <strong>{{ $end_date }}</strong></h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">
                                
    <table class="table table-borderedless table-striped"  width="100%" cellspacing="0">
        <thead>
            <tr>
              <th>Date</th>
                  <th>Products</th>
                  <th class="text-right">Quantity</th>
                  <th class="text-right">Price</th>
                  <th class="text-right">Total</th>                  
            </tr>
        </thead>
                                       
  <tbody>
      @foreach($purchases as $purchase)
           <tr>
                  <td> {{ $purchase->date }} </td>
                  <td> {{ $purchase->title }} </td>
                  <td class="text-right"> {{ $purchase->quantity }} </td>
                  <td class="text-right"> {{ $purchase->price }} </td>
                  <td class="text-right"> {{ $purchase->total }} </td>
         
     </tr>
 @endforeach

</tbody>

           <tr>
              <th></th>
              <th class="text-right">Total Items:</th>
              <th class="text-right">{{ $purchases->sum('quantity') }}</th>
               <th class="text-right">Total:</th>
              <th class="text-right">{{ $purchases->sum('total') }}</th>                   
            </tr>
   </table>
   </div>
  </div>
 </div>





@stop