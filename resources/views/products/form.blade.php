@extends('layout.main')

@section('main_content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if($mode == 'edit')
    <h2>Update <strong>{{ $products->title }}</strong> Product</h2>
    @else
    <h2>Add New Product</h2>
@endif
 

 <div class="card shadow mb-4">
      <div class="card-header py-3">

        @if($mode == 'edit')
            <h6>Update <strong>{{ $products->title }}</strong> Product</h6>
            @else
           <h6 class="m-0 font-weight-bold text-primary">Add New Product</h6>
          @endif
      
      </div>

<div class="card-body">
<div class="row justify-content-md-center">
  <div class="col-md-8">

 @if($mode == 'edit')

  {!! Form::model($products, [ 'route' => ['products.update', $products->id], 'method' => 'put' ]) !!}

  @else

    {!! Form::open([ 'route' => 'products.store', 'method' => 'post' ]) !!} 
      @endif
	
<div class="mb-3 row">
  <label for="Name" class="col-sm-2 col-form-label">Category<span class="text-danger">*</span> </label>
   <div class="col-sm-10">
	{{  Form::select('category_id',$categories,NULL,['class '=>'form-control','id' => 'product','placeholder' => 'Select Category']) }}
	</div>
</div>


<div class="mb-3 row">
  <label for="Name" class="col-sm-2 col-form-label"> Title<span class="text-danger">*</span></label>
   <div class="col-sm-10">
	{{ Form::text('title',NULL,['class '=>'form-control','id' => 'title','placeholder' => 'Title']) }}
	</div>
</div>



<div class="mb-3 row">
	<label for="Email" class="col-sm-2 col-form-label"> Description<span class="text-danger">*</span></label>
   <div class="col-sm-10">
    {{ Form::textarea('description',NULL,['class '=>'form-control','id' => 'description','placeholder' => 'Description']) }}		    
  </div>
</div>


<div class="mb-3 row">
	 <label for="Phone" class="col-sm-2 col-form-label">Cost Price <span class="text-danger">*</span></label>
 <div class="col-sm-10">
 {{ Form::text('cost_price',NULL,['class '=>'form-control','id' => 'cost_price','placeholder' => 'Cost Price']) }}		    

 </div>
</div>


<div class="mb-3 row">
   <label for="Address" class="col-sm-2 col-form-label">Price<span class="text-danger">*</span></label>
 <div class="col-sm-10">
	 {{ Form::text('price',NULL,['class '=>'form-control','id' => 'price','placeholder' => 'Price']) }}		      
 </div>
</div>


<div class="mb-3 row">
  <label for="Name" class="col-sm-2 col-form-label">Has Stock </label>
   <div class="col-sm-2">
  {{  Form::select('has_stock',['1'=>'YES','0'=>'NO'],NULL,['class '=>'form-control','id' => 'product']) }}
  </div>
</div>



<div class="col-md-3 mt-4 text-right">
	<input type="submit" class="btn btn-info" value="Submit">
</div>
		
	{!! Form::close() !!}
                             
        </div>
       </div>
      </div>
     </div>

@stop