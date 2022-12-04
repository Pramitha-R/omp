@extends('customer.dashboard')
@section('customer_content')

@if($amounts == null)
    <p>nothing happen here</p>

@else
<table style="border: 1px solid;">
    <tr>
        <th style="border: 1px solid;">Drugs Name</th>
        <th style="border: 1px solid;">Price for a Drug</th>
        <th style="border: 1px solid;">Counts</th>
        <th style="border: 1px solid;">Total Amount</th>
        <th style="border: 1px solid;">status</th>
    </tr>
    
    @foreach ($amounts as $amount)
    <tr style="border: 1px solid;">
        <td style="border: 1px solid;">{{$amount->drug}}</td>
        <td style="border: 1px solid;">{{$amount->price}}</td>
        <td style="border: 1px solid;">{{$amount->count}}</td>
        <td style="border: 1px solid;">{{$amount->total}}</td>
        @if($customer->status == 'null')


        <td>
            <form action="{{url('/cansalOrder',$customer->id)}}" method="post">
                @csrf
                <button class="btn btn-primary" name="status" value="cansaled">cansal the order</button>
            </form>
        </td>
        @elseif($customer->status == 'cansal')
        <td>Your order is not available in Our shop</td>

        @elseif($customer->status=='cansaled')
        <td>cansaled order</td>
        @endif
    </tr>
    @endforeach

    
</table>
@endif
@endsection