@extends('auth.template')
@section('content')
    <div class="main-wrapper">
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
            <div class="auth-box bg-dark border-top border-secondary">
                <div id="loginform">
                    <div class="text-center p-b-10">
                        <span class="db">
                            <a href="{{ route('homepage') }}"><img src="{{ $setting->logo }}" alt="logo" width="150" height="150"/></a>
                        </span>
                    </div>
                    <form class="form-horizontal m-t-20" id="loginform" method="POST" action="{{ route('login') }}" >
                        @csrf
                        <div class="row p-b-30">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-email"></i></span>
                                    </div>
                                    <input id="email" type="email" class="form-control-lg form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="e-posta adresiniz" value="{{ old('email') }}" required>

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
                                    <input id="password" type="password" class="form-control-lg form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="şifreniz" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong class="text-danger">{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="row border-top border-secondary">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="p-t-20">

                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}" class="btn btn-info float-right" id="to-recover"><i class="fa fa-lock m-r-5"></i> Şifremi unuttum?</a>
                                        @endif

                                        <button class="btn btn-success" type="submit">Giriş</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="recoverform">
                    <div class="text-center">
                        <span class="text-white">Enter your e-mail address below and we will send you instructions how to recover a password.</span>
                    </div>
                    <div class="row m-t-20">
                        <!-- Form -->
                        <form class="col-12" action="index.html">
                            <!-- email -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="ti-email"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-lg" placeholder="Email Address" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <!-- pwd -->
                            <div class="row m-t-20 p-t-20 border-top border-secondary">
                                <div class="col-12">
                                    <a class="btn btn-success" href="#" id="to-login" name="action">Back To Login</a>
                                    <button class="btn btn-info float-right" type="button" name="action">Recover</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection