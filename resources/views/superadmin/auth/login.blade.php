@extends('superadmin.layout.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col salogo mt-3">
            <img src="{{asset('/frontend/image/can_logo.png')}}" alt="logo">
        </div>
    </div>
    <div class="sa-panel">
        <div class="form-container sign-in-container">
            <form class="sasignin" role="form" method="POST" action="{{ url('/superadmin/login') }}">
                {{ csrf_field() }}
                <h2>Super Admin Signin</h2>
                    <input id="email" type="text" name="email" placeholder="email" value="{{ old('email') }}" autofocus>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    <input id="password" type="password" placeholder="password" name="password" value="" autofocus>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                <a  href="{{ url('/superadmin/password/reset') }}">Forgot your password?</a>
                <button type="submit">Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel">
                    <h1>Dhaka Cantonment Board</h1>
                    <h3>Case Management Software</h3>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
