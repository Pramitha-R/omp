@extends('layout')
@section('content')
<div class="row">
        <div  class="pull-right">
            <table>
                <tr>
                    <th><a class="btn btn-primary" style="width:240px" href="" >{{Auth::user()->name}}</a></th>
                    <th><a class="btn btn-primary" style="width:240px"  href="/customerprescription">customer's prescription</a></th>
                    <th><a class="btn btn-primary" style="width:240px" href="/logout">Logout</a></th>
                </tr>            
            </table>
        </div>
    </div>
    <div class="container">
            @yield('admin_content')
    </div>

@endsection