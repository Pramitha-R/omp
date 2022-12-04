@extends('layout')
@section('content')
<div class="login-form-wrap">
    <h2>Register</h2></br>

    @if ($message = Session::get('error'))
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif
    <form class="login-form" action="storeNewCustomer" method="post">
        @csrf

        <p>
            <input type="text" name="name" class="username" placeholder="Enter the Name " />
        </p>

        <p>
            <input type="email" name="email" class="email" placeholder="Enter the email " />
        </p>

        <p>
            <input type="text" name="address" class="username" placeholder="Enter the Address " />
        </p>

        <p>
            <input type="number" name="mobile" class="username" placeholder="Enter the mobile " />
        </p>

        <p>
            <input type="date" name="dob" class="username" placeholder="Enter the date of birthday " />
        </p>

        <p>
            <input type="password" name="password" class="username" placeholder="Enter the password " />
        </p>
</div>
<input id="invisible_id" name="status" type="hidden" value="null">
<input id="invisible_id" name="role" type="hidden" value="customer">

<p>
    <input type="submit" class="login" value="register">
</p>
</form>
<div class="create-account-wrap">
    <a href="{{url('/')}}">back</a>
</div>
</div>
</div>
@endsection