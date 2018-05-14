@extends('layouts.auth')

@section('content')
<form class="login-form" method="POST" action="{{ route('password.request') }}">
    {{ csrf_field() }}
    <input type="hidden" name="token" value="{{ $token }}">
    <h3 class="font-green">Reset Password</h3>
    <p> Enter your new password with your E-Mail Address. </p>
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label visible-ie8 visible-ie9">Email</label>
        <input class="form-control placeholder-no-fix" placeholder="E-Mail Address" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus />
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
    <div class="form-actions">
        <a href="{{ url()->previous() }}" id="back-btn" class="btn green btn-outline">Back</a>
        <button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
    </div>
</form>
@endsection