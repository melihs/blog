@extends('homepage.template')
@section('content')
<div class="zm-section bg-white pt-40 pb-70 ">
    <div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-5">
            <div class="section-title-2 mb-40">
                <h3 class="inline-block uppercase">Yeni Kullanıcı Kaydı</h3>
            </div>
        </div>
    </div>
    <div class="registation-form-wrap">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="single-input">
                        <label>Adınız Soydınız</label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required >

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                            <strong class="text-danger">{{ $errors->first('name') }}</strong>
                        </span>
                        @endif

                    </div>
                    <div class="single-input">
                        <label>E-Posta</label>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"  value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                              <strong class="text-danger">{{ $errors->first('email') }}</strong>
                            </span>
                        @endif

                    </div>
                    <div class="single-input">
                        <label>Şifre</label>
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"  required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                              <strong class="text-danger">{{ $errors->first('password') }}</strong>
                            </span>
                        @endif

                    </div>
                    <div class="single-input">
                        <label>Şifre Tekrar</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12">
                    <div class="single-input">
                        <button class="submit-button mt-20 inline-block" type="submit">Kayıt Ol</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
@endsection
