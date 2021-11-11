@extends('user.index')
@section('content')
<main class="login col-md-12">
    <div class="login_wrapper">
        @if (Session::get('message'))
            <h1>{{ Session::get('message') }}</h1>
        @endif
        <h1></h1>
        <form class="form login_form" action="{{ route('register.store') }}">
            <div class="form-group text-center">
                <p class="text-danger register_p">Fill out your information to create an account</p>
            </div>
            <div class="form-group">
                <label for="name">User name</label>
                <input class="form-control" type="text" name="name" id="name" placeholder="Enter user name" minlength="6">
            </div>
            <div class="form-group">
                <label for="account_name">User Account name</label>
                <input class="form-control" type="text" name="account_name" id="account_name" placeholder="Enter user account name" minlength="6">
            </div>
            <div class="form-group">
                <label for="gmail">User gmail</label>
                <input class="form-control" type="text" name="gmail" id="gmail" placeholder="Enter user gmail" minlength="6">
            </div>
            <div class="form-group">
                <label for="pass">Password</label>
                <input class="form-control" type="text" name="pass" id="pass" placeholder="Enter user password" minlength="6">
            </div>
            <div class="form-group">
                <label for="pass2">Password again</label>
                <input class="form-control" type="text" name="pass2" id="pass2" placeholder="Enter user password again" minlength="6">
            </div>
            <div class="form-group">
                <span>Do you already have an account ?</span> <span><a href="{{ route('login.form') }}">Login</a></span>
            </div>
            <div class="form-group d-flex align-items-center justify-content-center">
                <button class="btn btn-primary" type="submit">Register</button>
            </div>
        </form>
    </div>
</main>
@endsection