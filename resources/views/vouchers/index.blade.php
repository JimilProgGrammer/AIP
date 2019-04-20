@extends('base')

@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Vouchers</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Created By</td>
          <td>File Location</td>
          <td>Total Value</td>
          <td>From Name</td>
          <td>From City</td>
          <td>To Name</td>
          <td>To City</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($vouchers as $voucher)
        <tr>
            <td>{{$voucher->id}}</td>
            <td>{{$voucher->user_id}}</td>
            <td>{{$voucher->file_loc}}</td>
            <td>{{$voucher->total_value}}</td>
            <td>{{$voucher->from_name}}</td>
            <td>{{$voucher->from_city}}</td>
            <td>{{$voucher->to_name}}</td>
            <td>{{$voucher->to_city}}</td>
            <td>
                <a href="{{ route('vouchers.edit',$voucher->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('vouchers.destroy', $voucher->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection