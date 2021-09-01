@extends('layout.main')

@section('main_content')
  <div class="row page-header">
  	 <div class="col-md-6">
  	 	<h2>Product Stocks</h2>
  	 </div>
  	
  </div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Product Stocks</h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">
                                
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
              <th>ID</th>
              <th>Category</th>
              <th>Title</th>
              <th>Purchases</th>
              <th>Sales</th>
               <th>Stocks</th>                            
            </tr>
        </thead>
         
                                       
  <tbody>
@foreach($products as $product)
       <tr>
          <td>{{ $product->id }}</td>
          <td>{{ $product->category->title}}</td>
          <td>{{ $product->title }}</td>
          <td>{{ $purchases = $product->purchaseItems()->sum('quantity') }}</td>
          <td>{{ $sales =$product->salesItems()->sum('quantity') }}</td>
          <td>{{ $purchases - $sales }}</td>
      
   
     </tr>
 @endforeach
</tbody>
         <tfoot>
             <tr>
              <th>ID</th>
              <th>Category</th>
              <th>Title</th>
              <th>Purchases</th>
              <th>Sales</th>
              <th>Stocks</th>                          
            </tr>
          </tfoot>
   </table>
   </div>
  </div>
 </div>





@stop