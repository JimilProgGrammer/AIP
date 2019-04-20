@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Create a Voucher</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('contacts.store') }}">
          @csrf
          <div class="form-group">    
              <label for="first_name">User ID:</label>
              <input type="text" class="form-control" name="user_id"/>
          </div>

          <div class="form-group">
              <label for="last_name">File Location:</label>
              <input type="text" class="form-control" name="file_loc"/>
          </div>

          <div class="form-group">
              <label for="email">Total Value:</label>
              <input type="text" class="form-control" name="total_value"/>
          </div>
          <div class="form-group">
              <label for="city">From Company Name:</label>
              <input type="text" class="form-control" name="from_name"/>
          </div>
          <div class="form-group">
              <label for="country">From Company City:</label>
              <input type="text" class="form-control" name="from_city"/>
          </div>
          <div class="form-group">
              <label for="job_title">To Company Name:</label>
              <input type="text" class="form-control" name="to_name"/>
          </div>                       
          <div class="form-group">
              <label for="job_title">To Company City:</label>
              <input type="text" class="form-control" name="to_city"/>
          </div>                           
          <button type="submit" class="btn btn-primary-outline">Add Voucher</button>
      </form>
  </div>
</div>
</div>
@endsection