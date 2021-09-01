@extends('users.invoice_user_layout')

@section('user_content')


   <div class="card shadow mb-4">

      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Sale Invoice Details</h6>
      </div>

  <div class="card-body user_show">

      <div class="row justify-content-md-center">
        <div class="col-md-6">
          <p><strong>Customer : </strong> {{ $user->name }}</p>
          <p><strong>Email : </strong>{{ $user->email }}</p>
          <p><strong>Phone : </strong>{{ $user->phone }}</p>
        </div>
         <div class="col-md-6 text-right">
            <p><strong>Date : </strong> {{ $invoice->date }}</p>
            <p><strong>Challan No : </strong> {{ $invoice->challan_no }}</p>

        </div>
      </div>
     
     <div class="sales_invoice">
        <table class="table">
          <thead>
             <th>SL</th>
             <th>Product</th>
             <th>Price</th>
             <th>Qty</th>
             <th>Total</th>
             <th class="text-right">Actions</th>
          </thead>

          <tbody>
            @foreach($invoice->items as $key =>$item)
             <tr>
               <td>{{ $key+1 }}</td>
               <td>{{ $item->product->title }}</td>
               <td>{{ $item->price }}</td>
               <td>{{ $item->quantity }}</td>
               <td>{{ $item->total }}</td>
              <td class="text-right">

    <form method='post' action="{{ route('user.sales.invoice.delete_item',
       ['id'=> $user->id,'invoice_id' =>$invoice->id,'item_id'=>$item->id]) }}">   
          @csrf
          @method('DELETE')               
         <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger"> <i class="fa fa-trash"></i></button>                 
      </form>
                                           
   </td>
             </tr>
           @endforeach
          </tbody>

          <tr>
             <th></th>
             <th>
              <button data-toggle="modal" data-target="#newProduct" class="btn btn-info"><i class="fa fa-plus">Add Product</i></button> 
              <th>
             <th colspan="" class="text-right">Total =</th>
             <th>{{ $totalPayable= $invoice->items()->sum('total') }}</th>
          </tr>


          <tr>
             <th></th>
             <th>
              <button data-toggle="modal" data-target="#newrReceiptForInvoice" class="btn btn-primary"><i class="fa fa-plus">Add Receipt</i></button> 
              <th>
             <th colspan="" class="text-right">Paid =</th>
             <th>{{ $totalPaid =$invoice->receipts()->sum('amount') }}</th>
          </tr>

           <tr>
             <th></th>
             
             <th colspan="3" class="text-right">Due =</th>
             <th>{{ $totalPayable - $totalPaid }}</th>
          </tr>

        </table>
     </div>






   </div>
    

    
 </div>



<!-----Modal for Sale----->

<div class="modal fade" id="newProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  {!! Form::open(['route' => ['user.sales.invoice.additem', ['id' => $user->id, 
    'invoice_id' => $invoice->id] ], 'method' => 'post' ]) !!}

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      
    <div class="mb-2 row">
      <label for="product" class="col-sm-2 col-form-label">Product<span class="text-danger">*</span> </label>
       <div class="col-sm-10">
      {{  Form::select('product_id',$products,NULL,['class '=>'form-control','id' => 'product','placeholder' => 'Select Group']) }}
      </div>
    </div>

    <div class="mb-3 row">
      <label for="unit_price" class="col-sm-2 col-form-label">Unit Price<span class="text-danger">*</span></label>
       <div class="col-sm-10">
      {{ Form::text('price',NULL,['class '=>'form-control', 
      'onkeyup' =>'getTotal()','required','id' => 'unit_price','placeholder' => 'Unit Price']) }}
      </div>
    </div>


      <div class="mb-3 row">
        <label for="quantity" class="col-sm-2 col-form-label">Quantity<span class="text-danger">*</span></label>
         <div class="col-sm-10">
          {{ Form::text('quantity',NULL,['class '=>'form-control',
          'onkeyup' => 'getTotal()','required','id' => 'quantity','placeholder' => 'Quantity']) }}        
        </div>
      </div>

      <div class="mb-3 row">
        <label for="total" class="col-sm-2 col-form-label">Total<span class="text-danger">*</span></label>
         <div class="col-sm-10">
          {{ Form::text('total',NULL,['class '=>'form-control','id' => 'total','rows' => '3','placeholder' => 'Total']) }}        
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






<!-----Modal for ReceiptInvoice----->

<div class="modal fade" id="newrReceiptForInvoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  {!! Form::open(['route' => ['user.receipts.store',[$user->id,$invoice->id] ],'method' => 'post']) !!}

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Receipts For This Invoice</h5>
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

<script type="text/javascript">

    function getTotal() {
      var price     = document.getElementById("unit_price").value;
      var quantity  = document.getElementById("quantity").value;
      if ( price && quantity ) {
        var total = price * quantity;
        document.getElementById("total").value = total;
      }
    }
    
  </script>



@stop