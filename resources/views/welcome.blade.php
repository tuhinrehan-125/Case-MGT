@extends('layouts.app')


@section('css')

<style>
    .login-area {
        margin-top: 200px;
    }

    @media only screen and (min-device-width: 320px) and (max-device-width: 640px) {
        .login-area {
            margin-top: 40px;
        }
    }

    @media only screen and (min-device-width: 414px) and (max-device-width: 736px) {
        .wel-card {
            width: 388px;
            margin-left: -18px;
        }
    }
</style>
@endsection

@section('content')
<div class="row m-3">
    <div class="col-md-6 col-lg-6 col-sm-12">
        <h2 class="text-center font-weight-bold" style="background: #A22C31;color: #fff;box-shadow:0 5px 4px rgb(0 0 0 / 25%), 0 10px 10px rgb(0 0 0 / 22%)">Type of case</h2>
        <table class="table" id="cases-table">
            <thead>
                <th>SL</th>
                <th>Name</th>
                <th>Fine</th>
            </thead>
            <tbody>
                @foreach($crime as $data)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$data->crime?? ''}}</td>
                    <td>{{$data->fine_crime?? 0}}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <th>SL</th>
                <th>Name</th>
                <th>Fine</th>
            </tfoot>
        </table>

    </div>
    <div class="col-md-6 col-lg-6 col-sm-12">
        <div class="login-area section-padding">
            <div class="container-fluid p-3 usersignin">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card wel-card">
                            @auth
                            <a href="{{url('/home')}}" class="text-center btn btn-success">
                                <i class="fas fa-list"></i>
                                <span class="menu-text">
                                    Go to dashboard
                                </span>
                            </a>
                            @else
                            <div class="card-header text-center text-light form-head" style="background-color: #A22C31;">
                                <h3 class="text-center font-weight-bold">User Login</h3>

                            </div>
                            <div class="card-body">
                                <form method="POST"  action="{{ route('user.login') }}">
                                    @csrf
                                    <input id="email" type="text" name="email" placeholder="Vehicle Registration Number" value="{{ old('email') }}" autofocus>
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

                                    {{-- <div class="form-group row justify-content-md-center">
                                        <label for="email" class="col-md-6 col-form-label text-md-right login-label">{{ __('Vehicle Registration Number') }}</label>

                                        <div class="col-md-6 login-input">
                                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="password" class="col-md-6 col-form-label text-md-right login-label">{{ __('Password') }}</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div> --}}

                                    <div class="form-group row">
                                        <div class="col-md-8">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} style="float: left;width: 12px;">
                                                <label class="form-check-label" for="remember" style="margin-left: 22px;margin-top: 4px;">
                                                    {{ __('Remember Me') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-8 offset-md-4">
                                            <button type="submit">
                                                Sign In
                                            </button>

                                            @if (Route::has('password.request'))
                                            <a class="btn forget-pass" href="{{ url('password/reset') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $("#cases-table").DataTable();
    })
</script>
@endsection
