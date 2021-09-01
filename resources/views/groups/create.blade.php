@extends('layout.main')

@section('main_content')

<h2>User New Group</h2>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
       <h6 class="m-0 font-weight-bold text-primary">Add New Group</h6>
      </div>
     <div class="card-body">

<form action="{{ url('groups') }}" method="post" >
       @csrf
	<div class="mb-3">
	  <label for="exampleFormControlInput1" class="form-label">Add New Group</label>
	  <input type="text" placeholder="Add your title" name="title" class="form-control @error('title') is-invalid @enderror"
	   value="{{ old('title')  }}" id="exampleFormControlInput1">

	  @error('title')
        <span class="text-danger">{{ $message }}</span>
     @enderror
	</div>
	<input type="submit" class="btn btn-info" value="Submit">
</form>
                             
     </div>
     </div>

@stop