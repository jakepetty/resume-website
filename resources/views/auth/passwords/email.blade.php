@extends('layouts.login')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header text-center p-5">{{ __('Reset Password') }}</div>

        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group mb-3">
                    <label for="email">{{ __('E-Mail Address') }}</label>

                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Enter your email address..." required> @if ($errors->has('email'))
                    <span class="invalid-feedback mt-3" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span> @endif
                </div>

                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-primary btn-block p-3">{{ __('Send Reset Link') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
