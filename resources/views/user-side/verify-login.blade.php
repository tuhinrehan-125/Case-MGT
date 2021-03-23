@extends('layouts.app')

@section('content')
<div class="row m-3">
    <div class="col-md-6 col-lg-6 col-sm-12">
        <h2 class="text-center font-weight-bold"  style="background: #A22C31;color: #fff;box-shadow:0 5px 4px rgb(0 0 0 / 25%), 0 10px 10px rgb(0 0 0 / 22%)">Type of case</h2>
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
        <div class="login-area section-padding" style="margin-top: 200px">
            <div class="container-fluid p-3">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="card">

                <div class="card-header text-center text-light form-head" style="background-color: #A22C31;">{{ __('Login') }}</div>

                <div class="card-body  p-3">
                    <form method="POST" action="{{ route('user.verify.login') }}">
                        @csrf
                        <input type="hidden" name="email" value="{{$email ?? ''}}">
                        <input type="hidden" name="password" value="{{$password ?? ''}}">

                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">{{ __('Code') }}</label>

                            <div class="col-md-6">
                            <input id="code" type="text" class="form-control " value="{{$code}}" name="code" >
                                <span id="error_code"></span>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4" >
                                <button type="submit" id="login" class="btn" style="background-color: #A22C31;color: #fff;">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
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
            var code ='{{$code ?? ''}}';
            $("#code").keyup(function () {
                var form=$(this).val();
                if(code==form){

                    $('#login').prop('disable',false);
                    $('#error_code').html('<label class="text-success"><b>Your code is valid</b></label>');
                    $('#code').removeClass('has-error');
                    $('#login').attr('disabled', false);
                    // $('#login').css('display', 'block');
                }else{
                    $('#error_code').html('<label class="text-danger"><b>Your Code is invalid or time out</b></label>');
                    $('#code').addClass('has-error');
                    $('#login').attr('disabled', 'disabled');
                    // $('#login').css('display', 'none');
                }
            })
        })
        $(document).ready(function(){
            $("#cases-table").DataTable();
        })
    </script>
    @endsection
