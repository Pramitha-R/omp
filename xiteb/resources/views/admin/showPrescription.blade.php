@extends('admin.dashboard')
@section('admin_content')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<table style="border: 1px solid;">
    <tr>
        <th style="border: 1px solid;">Customer name</th>
        <th style="border: 1px solid;">Address</th>
        <th style="border: 1px solid;">Mobile</th>
        <th style="border: 1px solid;">Email</th>
        <th style="border: 1px solid;">DOB</th>
        <th style="border: 1px solid;" >status</th>

    </tr>


    @foreach ($customers as $customer)
    <tr style="border: 1px solid;">
        <td style="border: 1px solid;">{{$customer->name}}</td>
        <td style="border: 1px solid;">{{$customer->address }}</td>
        <td style="border: 1px solid;">{{$customer->mobile }}</td>
        <td style="border: 1px solid;">{{$customer->email }}</td>
        <td style="border: 1px solid;">{{$customer->dob}}</td>
        @if($customer->status == 'cansaled')
        <td>customer just cansaled the order</td>
        @elseif($customer->status == 'null')
        <td>
            <form action="{{url('/cansalOrderByAdmin',$customer->id)}}" method="post">
                @csrf
                <button class="btn btn-primary" name="status" value="cansal">cansal Prescription</button>
                <a href="{{url('viewprescription',$customer->id)}}" class="btn btn-secondary">View Prescription</a>
            </form>
                  </td>
        @elseif($customer->status == 'cansal')
        <td>cansal order by admin</td>
        @endif
    </tr>
    @endforeach





</table>



@endsection