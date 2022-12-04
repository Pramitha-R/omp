@extends('layout')
@section('content')
<div class="row">
        <div  class="pull-right">
            <table>
                <tr>
                    <th><a class="btn btn-primary" style="width:240px" href="" >{{$customer->name}}</a></th>
                    <th><a class="btn btn-primary" style="width:240px"  href="{{url('prescriptionPage',$customer->id)}}">create prescription</a></th>
                    <th><a class="btn btn-primary" style="width:240px"  href="{{url('/showprice',$customer->id)}}">show price detail </a></th>
                    <th><a class="btn btn-primary" style="width:240px" href="/logout">Logout</a></th>
                </tr>            
            </table>
        </div>
    </div>

    <div class="container">
            @yield('customer_content')
    </div>

@endsection