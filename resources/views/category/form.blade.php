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
<h2>Update <strong>{{ $category->title }}</strong> Category</h2>
 @else
 <h2>Add New Category</h2>
@endif


    <div class="card shadow mb-4">
      <div class="card-header py-3">
       {{-- <h6 class="m-0 font-weight-bold text-primary">Add Category</h6> --}}
      </div>
     <div class="card-body">

     @if($mode == 'edit')

      {!! Form::model($category,['route' => ['categories.update',$category->id],'method' => 'PUT']) !!}

      @else

    {!! Form::open(['route' => 'categories.store','method' => 'post']) !!}
      @endif


	<div class="mb-3">
	  <label for="exampleFormControlInput1" class="form-label">
    @if($mode == 'edit')
    <h>Update <strong>{{ $category->title }}</strong> Category</h2>
     @else
     <h6>Add New Category</h6>
    @endif
    </label>

	 {{ Form::text('title',NULL,['class '=>'form-control','id' => 'title','placeholder' => 'Title']) }}
   
	</div>
	<input type="submit" class="btn btn-info" value="Submit">

  {!! Form::close() !!}
                             
     </div>
     </div>

@stop