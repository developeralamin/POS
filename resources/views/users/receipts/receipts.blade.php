@extends('users.user_layout')

@section('user_content')


   <div class="card shadow mb-4">
      

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


      <div class="card-header py-3">
          
      </div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
       <h6 class="m-0 font-weight-bold text-primary">Receipts of <strong>{{ $user->name }}</strong></h6>
    </div>

<div class="card-body">
  <div class="table-responsive">                      
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Admin</th>
                <th>Date</th>
                <th class="text-right">Total</th>
                <th>Note</th>
                <th class="text-right">Actions</th>                          
              </tr>
            </thead>

        <tfoot>
          <tr>
            <th colspan="2" class="text-right">Total:</th>
            <th class="text-right">{{ $user->receipts()->sum('amount') }}</th>
            <th colspan="">Note</th>
            <th class="text-right">Actions</th>
          </tr>
        </tfoot>
                                       
  <tbody>
@foreach($user->receipts as $receipt)
       <tr> 
          <td>{{ optional($receipt->admin)->name  }}</td>
          <td>{{ $receipt->date }}</td>
          <td class="text-right">{{ $receipt->amount }}</td>
          <td>{{ $receipt->note }}</td>
          <td class="text-right">

<form method='post' action="{{ route('user.receipts.destroy',['id'=> $user->id,'receipts_id' => $receipt->id]) }}">
      @csrf
      @method('DELETE')               
     <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger"> <i class="fa fa-trash"></i></button>                 
  </form>
                                           
   </td>
  </tr>
 @endforeach

       </tbody>
   </table>
   </div>
  </div>
 </div>


 </div>

@stop