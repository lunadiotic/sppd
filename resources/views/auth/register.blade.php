@extends('layouts.auth')

@section('content')
<form class="login-form" method="POST" action="{{ route('register') }}">
    {{ csrf_field() }}
    <h3 class="font-green">Sign Up</h3>
    <p class="hint"> Enter your personal details below: </p>
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label class="control-label visible-ie8 visible-ie9">Full Name</label>
        <input class="form-control placeholder-no-fix" type="text" placeholder="Full Name" name="name" value="{{ old('name') }}" required autofocus/>
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label visible-ie8 visible-ie9">Email</label>
        <input class="form-control placeholder-no-fix" placeholder="E-Mail Address" type="email" class="form-control" name="email" value="{{ old('email') }}" required />
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label class="control-label visible-ie8 visible-ie9">Password</label>
        <input class="form-control placeholder-no-fix" type="password" placeholder="Password" name="password" required />
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
        <input id="password-confirm" class="form-control placeholder-no-fix" type="password" placeholder="Re-type Your Password" name="password_confirmation" required />
    </div>
    <div class="form-group margin-top-20 margin-bottom-20">
        <label class="mt-checkbox mt-checkbox-outline">
            <input type="checkbox" name="tnc" /> I agree to the
            <a href="javascript:;">Terms of Service </a> &
            <a href="javascript:;">Privacy Policy </a>
            <span></span>
        </label>
        <div id="register_tnc_error"> </div>
    </div>
    <div class="form-actions">
        <a href="{{ url()->previous() }}" id="register-back-btn" class="btn green btn-outline">Back</a>
        <button type="submit" id="register-submit-btn" class="btn btn-success uppercase pull-right">Submit</button>
    </div>
</form>
@endsection