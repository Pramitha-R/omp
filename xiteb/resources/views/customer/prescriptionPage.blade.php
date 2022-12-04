@extends('customer.dashboard')
@section('customer_content')

@if(session('success'))
<div class="alert alert-success">
  {{ session('success') }}
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
  <strong>Whoops!</strong> There were some problems with your input.<br><br>
  <ul>
    @foreach ($errors as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
<form action="{{url('/storeprescription')}}" method="post" enctype="multipart/form-data">
  @csrf

  <!--for image store-->
  <div class="input-group control-group increment">
    <input type="file" name="image1" multiple class="form-control">
  </div>
  </br>
  <div class="mb-2 row">
    <label for="note" class="col-sm-2 col-form-label"><b>Note:</b></label>
    <div class="col-sm-10">
      <textarea type="text" class="from-control" name="note"></textarea>
    </div>
  </div>
  <div class="mb-2 row">
    <label for="address" class="col-sm-2 col-form-label"><b>Delivery Address:</b></label>
    <div class="col-sm-10">
      <input type="text" class="from-control" name="address" />
    </div>
  </div>
  <div class="mb-2 row">
    <label for="time" class="col-sm-2 col-form-label"><b>Delivery Time:</b></label>
    <div class="col-sm-10">
      <input type="time" class="from-control" name="time" />
    </div>
  </div>

  <input id="invisible_id" name="custemail" type="hidden" value="{{$customer->email}}">

  <div style="padding-left:250px ; ">
    <button type="submit" class="btn btn-primary"><b>Add</b></button>
  </div>
</form>


@endsection