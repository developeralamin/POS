@extends('layout.main')

@section('main_content')
  <div class="row page-header">
  	 <div class="col-md-6">
       <a href="{{ route('products.index') }}" class="btn btn-primary"> <i class="fa fa-arrow-left"></i> Back</a>
  	 </div>
  </div>

<!-- DataTales Example -->
   <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Product <strong>{{ $product->title }}'s</strong> Information</h6>
      </div>
  <div class="card-body user_show">

      <div class="row justify-content-md-center">
        <div class="col-md-8">
          <table class="table table-borderless table-striped table-hover mt-4">

              <tr>
                <th class="text-right">Category : </th>
                <td>{{ $product->category->title }}</td>
              </tr>

              <tr>
                <th class="text-right">Title : </th>
                <td>{{ $product->title }}</td>
              </tr>

              <tr>
                <th class="text-right">Description : </th>
                <td>{{ $product->description }}</td>
              </tr>

              <tr>
                <th class="text-right">Cost Price : </th>
                <td>{{ $product->cost_price }}</td>
              </tr>

              <tr>
                <th class="text-right">Price : </th>
                <td>{{ $product->price }}</td>
              </tr>

          </table>


        </div>
      </div>
     



   </div>
 </div>


@stop