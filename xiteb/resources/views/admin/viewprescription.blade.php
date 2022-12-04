@extends('admin.dashboard')
@section('admin_content')

<a href="">showPrescription</a>

@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
<table style="border: 1px solid;" >
        <tr >
            <th  style="border: 1px solid;" >Images</th>
            <th style="border: 1px solid;">note</th>
            <th style="border: 1px solid;">delivary address</th>
            <th style="border: 1px solid;">delivery time</th>
            <th style="border: 1px solid;">confirm</th>
        </tr>
        
        
       @foreach( $prescription as $prescription)
        <tr style="border: 1px solid;">
            <td style="border: 1px solid;"><img src="{{asset('/imgages/prescription/'.$prescription->image1)}}"  width="50px" height="50px" alt=""></td>
            <td style="border: 1px solid;">{{$prescription->note}}</td>
            <td style="border: 1px solid;">{{$prescription->address}}</td>
            <td style="border: 1px solid;">{{$prescription->time}}</td>
            <td>
                <a href="{{url('/addprice',$prescription->id)}}" type="button">Quantity</a>
            </td>
        </tr>
        @endforeach
        
       
    </table>


@endsection