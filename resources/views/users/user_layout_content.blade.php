
<div class="row clearfix user_page_builder">

  <div class="col-md-2">

      <div class="nav flex-column nav-pills">
        <a class="nav-link @if($tab_menu == 'user_info') active @endif" href="{{route('users.show', $user->id)}}">User Info</a>

        <a class="nav-link @if($tab_menu == 'reports') active @endif" href="{{route('users.reports',$user->id)}}">Reports</a>

        <a class="nav-link @if($tab_menu == 'sales') active @endif" href="{{ route('user.sales',$user->id) }}">Sales</a>

        <a class="nav-link  @if($tab_menu == 'purchase') active @endif" href="{{ route('user.purchases',$user->id) }}">Purchase</a>

        <a class="nav-link @if($tab_menu == 'payments') active @endif" href="{{ route('user.payments',$user->id) }}">Payments</a>

        <a class="nav-link @if($tab_menu == 'receipts') active @endif" href="{{ route('user.receipts',$user->id) }}">Receipts</a>
      </div>
       
  </div>


<div class="col-md-10">
   
  @yield('user_content')


</div>

</div>




<!-----Modal for payments----->

<div class="modal fade" id="newpayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  {!! Form::open(['route' => ['user.payments.store',$user->id],'method' => 'post']) !!}

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Payment</h5>
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

