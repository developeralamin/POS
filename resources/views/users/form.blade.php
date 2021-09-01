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
 
<h2>Update <strong>{{ $user->name }}</strong> information</h2>
 @else
 <h2>Add New User</h2>
@endif


 <div class="card shadow mb-4">
      <div class="card-header py-3">

        @if($mode == 'edit')
        <h6>Update <strong>{{ $user->name }}</strong>'s information</h6>
         @else
          <h6 class="m-0 font-weight-bold text-primary">Add New User</h6>
        @endif

     
      </div>

<div class="card-body">
<div class="row justify-content-md-center">
  <div class="col-md-8">


    @if($mode == 'edit')

      {!! Form::model($user,['route' => ['users.update',$user->id],'method' => 'PUT']) !!}
     @else

    {!! Form::open(['route' => 'users.store','method' => 'post']) !!}

    @endif

	
<div class="mb-3 row">
  <label for="Name" class="col-sm-2 col-form-label">User Group <span class="text-danger">*</span> </label>
   <div class="col-sm-10">
	{{  Form::select('group_id',$groups,NULL,['class '=>'form-control','id' => 'group','placeholder' => 'Select Group']) }}
	</div>
</div>


<div class="mb-3 row">
  <label for="Name" class="col-sm-2 col-form-label"> Name<span class="text-danger">*</span></label>
   <div class="col-sm-10">
	{{ Form::text('name',NULL,['class '=>'form-control','id' => 'name','placeholder' => 'Name']) }}
	</div>
</div>


<div class="mb-3 row">
   <label for="Phone" class="col-sm-2 col-form-label">Phone <span class="text-danger">*</span></label>
 <div class="col-sm-10">
 {{ Form::text('phone',NULL,['class '=>'form-control','id' => 'phone','placeholder' => 'Phone']) }}       

 </div>
</div>


<div class="mb-3 row">
	<label for="Email" class="col-sm-2 col-form-label"> Email</label>
   <div class="col-sm-10">
    {{ Form::text('email',NULL,['class '=>'form-control','id' => 'email','placeholder' => 'Email']) }}		    
  </div>
</div>



<div class="mb-3 row">
   <label for="Address" class="col-sm-2 col-form-label">Address</label>
 <div class="col-sm-10">
	 {{ Form::text('address',NULL,['class '=>'form-control','id' => 'address','placeholder' => 'Address']) }}		      
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