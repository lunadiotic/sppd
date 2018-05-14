@extends('layouts.auth')

@section('content')
<form class="login-form" method="POST" action="{{ route('password.email') }}">
    {{ csrf_field() }}
    <h3 class="font-green">Forget Password ?</h3>
    @if (session('status'))
        <div class="alert alert-success">
            <button class="close" data-close="alert"></button>
            <span> {{ session('status') }} </span>
        </div>
    @endif
    <p> Enter your e-mail address below to reset your password. </p>
    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <input class="form-control placeholder-no-fix" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required />
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif 
    </div>
    <div class="form-actions">
        <a href="{{ url()->previous() }}" id="back-btn" class="btn green btn-outline">Back</a>
        <button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
    </div>
</form>
@endsection
