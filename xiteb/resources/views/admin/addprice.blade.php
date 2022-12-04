@extends('admin.dashboard')
@section('admin_content')
<div onload="multiply();">

    <a href="">showPrescription</a>-> <a href="/viewprescription/{customer}">viewprescription</a>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <h3>Add Price for prescription</h3>
    <form action="{{url('/getTotalAmount')}}" method="post">
        @csrf

        <div class="mb-2 row">
            <label for="drug" class="col-sm-2 col-form-label"><b>DrugsName:</b></label>
            <div class="col-sm-10">
                <input type="text" class="from-control" name="drug" />
            </div>
        </div>

        <div class="mb-2 row">
            <label for="price" class="col-sm-2 col-form-label"><b>price</b></label>
            <div class="col-sm-10">
                <input type="number" id="price" class="from-control" name="price" onclick="multiply();" />
            </div>
        </div>

        <div class="mb-2 row">
            <label for="count" class="col-sm-2 col-form-label"><b>count:</b></label>
            <div class="col-sm-10">
                <input type="number" id="count" class="from-control" name="count" onclick="multiply();" />
            </div>
        </div>

        <div class="mb-2 row">
            <label for="count" class="col-sm-2 col-form-label"><b>Total Amount:</b></label>
            <div class="col-sm-10">
                <input type="number" id="total" class="from-control" name="total" />
            </div>
        </div>
        <input id="invisible_id" name="custemail" type="hidden" value="{{$prescription->custemail}}">


        <div style="padding-left:250px ; ">
            <button type="submit" class="btn btn-primary"><b>Ok</b></button>
        </div>
    </form>

    <script>
        function multiply() {
            var price = document.getElementById("price").value;
            var count = document.getElementById("count").value;
            var total = parseFloat(price) * parseFloat(count);
            document.getElementById("total").value = total;
        }
    </script>
</div>
@endsection