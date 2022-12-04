@extends('layout')
@section('content')
<div class="login-form-wrap">
    <div >
        <h2>Login</h2><br />
        @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>{{ $message }}</strong>
        </div>
        @endif


        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br />
        @endif
        <form class="login-form" action="checklogin" method="post">
            @csrf
            <p>
                <input type="email"  name="email" class="email" placeholder="Enter the Email " />
            </p>
            <p>
                <input type="password"  name="password" class="username" placeholder="Enter the Password" />
            </p>
            <p>
                <input type="submit" class="login" value="Login">
            </p>
        </form>
        <div class="create-account-wrap">
            <p>Not a member? <a href="/registration">Create Account</a>
            <p>
        </div>
    </div>
</div>
        


@endsection