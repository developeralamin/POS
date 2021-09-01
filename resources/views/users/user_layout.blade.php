@extends('layout.main')

@section('main_content')

 @yield('card_user')

  <div class="row page-header ">

     <div class="col-md-6">
       <a href="{{ route('users.index') }}" class="btn btn-info"> <i class="fa fa-arrow-left"></i> Back</a>
     </div>

     <div class="col-md-6 text-right">

        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#newrsale">
          <i class="fa fa-plus"></i> New Sale
        </button>

         <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#newpayment">
           <i class="fa fa-plus"></i> New Payment
        </button>

        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#newPurchases">
          <i class="fa fa-plus"></i> New Purchase
        </button>

      <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#newreceipt">
           <i class="fa fa-plus"></i> New Receipt
        </button>
     
 </div>
      
  </div>


@include('users.user_layout_content')





<!-----Modal for receipts----->

<div class="modal fade" id="newreceipt" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  {!! Form::open(['route' => ['user.receipts.store',$user->id],'method' => 'post']) !!}

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Receipt</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


    <div class="mb-3 row">
      <label for="Name" class="col-sm-2 col-form-label">Amount<span class="text-danger">*</span></label>
       <div class="col-sm-10">
      {{ Form::text('amount',NULL,['class '=>'form-control', 'required','id' => 'name','placeholder' => 'Amount']) }}
      </div>
    </div>


      <div class="mb-3 row">
        <label for="Email" class="col-sm-2 col-form-label">Date<span class="text-danger">*</span></label>
         <div class="col-sm-10">
          {{ Form::date('date',NULL,['class '=>'form-control','required','id' => 'date','placeholder' => 'Date']) }}        
        </div>
      </div>

      <div class="mb-3 row">
        <label for="Email" class="col-sm-2 col-form-label">Date</label>
         <div class="col-sm-10">
          {{ Form::textarea('note',NULL,['class '=>'form-control','id' => 'note','rows' => '3','placeholder' => 'Note']) }}        
        </div>
      </div>


       </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>

{!! Form::close() !!}

    </div>
  </div>
</div>





<!-----Modal for Sale----->

<div class="modal fade" id="newrsale" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  {!! Form::open(['route' => ['user.sales.store',$user->id],'method' => 'post']) !!}

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Sale Invoice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


    <div class="mb-3 row">
      <label for="challan_no" class="col-sm-2 col-form-label">Challan Number</label>
       <div class="col-sm-10">
      {{ Form::text('challan_no',NULL,['class '=>'form-control','id' => 'challan_no','placeholder' => 'Challan Number']) }}
      </div>
    </div>


   <div class="mb-3 row">
        <label for="Email" class="col-sm-2 col-form-label">Date<span class="text-danger">*</span></label>
         <div class="col-sm-10">
          {{ Form::date('date',NULL,['class '=>'form-control','required','id' => 'date','placeholder' => 'Date']) }}        
        </div>
      </div>

      <div class="mb-3 row">
        <label for="Email" class="col-sm-2 col-form-label">Note</label>
         <div class="col-sm-10">
          {{ Form::textarea('note',NULL,['class '=>'form-control','id' => 'note','rows' => '3','placeholder' => 'Note']) }}        
        </div>
      </div>


       </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>

{!! Form::close() !!}

    </div>
  </div>
</div>



<!-----Modal for Purchase----->


<div class="modal fade" id="newPurchases" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  {!! Form::open(['route' => ['user.purchase.store',$user->id],'method' => 'post']) !!}

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Purchase Invoice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


    <div class="mb-3 row">
      <label for="challan_no" class="col-sm-2 col-form-label">Challan Number</label>
       <div class="col-sm-10">
      {{ Form::text('challan_no',NULL,['class '=>'form-control','id' => 'challan_no','placeholder' => 'Challan Number']) }}
      </div>
    </div>


   <div class="mb-3 row">
        <label for="Email" class="col-sm-2 col-form-label">Date<span class="text-danger">*</span></label>
         <div class="col-sm-10">
          {{ Form::date('date',NULL,['class '=>'form-control','required','id' => 'date','placeholder' => 'Date']) }}        
        </div>
      </div>

      <div class="mb-3 row">
        <label for="Email" class="col-sm-2 col-form-label">Note</label>
         <div class="col-sm-10">
          {{ Form::textarea('note',NULL,['class '=>'form-control','id' => 'note','rows' => '3','placeholder' => 'Note']) }}        
        </div>
      </div>


       </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>

{!! Form::close() !!}

    </div>
  </div>
</div>


@stop