@extends('auth.template')
@section('content')
    <div class="main-wrapper">
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
            <div class="auth-box bg-dark border-top border-secondary">
                <div>
                    <div class="text-center p-b-10">
                        <span class="db">
                            <a href="{{ route('homepage') }}"><img src="{{ $setting->logo }}" alt="logo" width="150" height="150"/></a>
                        </span>
                    </div>
                    <form class="form-horizontal m-t-20" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row p-b-30">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input id="name" type="text" class="form-control-lg form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Kullanıcı Adı" value="{{ old('name') }}" required >

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif

                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="ti-email"></i></span>
                                    </div>
                                    <input id="email" type="email" class="form-control-lg form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="E-posta" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input id="password" type="password" class="form-control-lg form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Parola" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-info text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" placeholder="Parola Tekrar" required>
                                </div>
                            </div>
                        </div>
                        <div class="row border-top border-secondary">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="p-t-20">
                                        <button class="btn btn-block btn-lg btn-info" type="submit">Kayıt Ol</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
