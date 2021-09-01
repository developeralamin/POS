@extends('layout.main')

@section('main_content')
  <div class="row page-header">
  	 <div class="col-md-4">
  	 	<h2>Receipt Reports</h2>
  	 </div>
     <div class="col-md-8">

        {!! Form::open(['route' => ['reports.receipts'],'method' => 'get']) !!}

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
      <h6 class="m-0 font-weight-bold text-primary">Receipts Reports From 
         <strong>{{ $start_date }}</strong> to <strong>{{ $end_date }}</strong></h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">
                                
    <table class="table table-borderedless table-striped"  width="100%" cellspacing="0">
        <thead>
            <tr>
                  <th>Date</th>
                  <th>User</th>
                  <th>Total</th>                  
            </tr>
        </thead>
                                       
  <tbody>
@foreach($receipts as $receipt)
       <tr>
          <td> {{ $receipt->date }} </td>
          <td> {{ optional($receipt->user)->name }} </td>
          <td> {{ $receipt->amount }} </td>
         
     </tr>
 @endforeach

</tbody>

           <tr>
                  <th>Date</th>
                  <th>User</th>
                  <th>{{ $receipts->sum('amount') }}</th>                       
            </tr>
   </table>
   </div>
  </div>
 </div>





@stop