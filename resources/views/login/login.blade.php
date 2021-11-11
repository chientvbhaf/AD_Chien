@extends('user.index')
@section('content')
    <main class="login col-md-12">
        <div class="card-body">
            @if (request()->text === 'admin')
                <a href="{{ url()->current() . '?text=user' }}" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-user"></i>
                    </span>
                    <span class="text">Login as user</span>
                </a>
            @else
                <a href="{{ url()->current() . '?text=admin' }}" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-users-cog"></i>
                    </span>
                    <span class="text">Login as developer</span>
                </a>
            @endif
        </div>
        <div class="login_wrapper">
            <form class="form login_form" action="{{ route('login.check').'?text='.'login'.request()->text }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="account_name">Account name</label>
                    <input class="form-control" type="text" name="account_name" id="account_name"
                        placeholder="Enter user account name" minlength="3">
                </div>
                <div class="form-group">
                    <label for="pass">Password</label>
                    <input class="form-control" type="text" name="pass" id="pass" placeholder="Enter user name"
                        minlength="3">
                </div>
                @if (request()->text === 'admin')
                @else
                    <div class="form-group">
                        <span>Not have an account yet?</span> <span><a href="{{ route('register.form') }}">create a new
                                one</a></span>
                    </div>

                @endif
                <div class="form-group d-flex align-items-center justify-content-center">
                    <button class="btn btn-primary" type="submit">Login</button>
                </div>
            </form>
        </div>
    </main>
@endsection
