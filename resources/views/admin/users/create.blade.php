@extends('admin.template')
@section('content')
    <div class="row-fluid">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href='{{route('kategoriler.index')}}'>Kullanıcılar</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Ekle</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <form method="POST" action="{{ route('kullanici.store') }}" enctype="multipart/form-data">
                @csrf
            <div class="card-body">
                <h4 class="card-title"> Yeni Kullanıcı Ekle</h4>
                <div class="form-group row">
                    <label for="role" class="col-sm-3 text-right control-label col-form-label">Yetki</label>
                    <div class="col-sm-9">
                        <select id="role" class="form-control" name="role" >
                            <option value="normal" selected >Standart Kullanıcı</option>
                            <option value="admin" >Admin</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 text-right control-label col-form-label">Kullanıcı Adı</label>
                    <div class="col-sm-9">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif

                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-3 text-right control-label col-form-label">E-mail adresi</label>
                    <div class="col-sm-9">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"  value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif

                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-3 text-right control-label col-form-label">Parola</label>
                    <div class="col-sm-9">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"  required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif

                    </div>
                </div>
                <div class="form-group row">
                    <label for="password-confirm" class="col-sm-3 text-right control-label col-form-label"> Tekrar Parola</label>
                    <div class="col-sm-9">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="avatar" class="col-sm-3 text-right control-label col-form-label">Avatar</label>
                    <div class="col-sm-9">
                        <input id="avatar" type="file" class="form-control{{ $errors->has('avatar') ? ' is-invalid' : '' }}" name="avatar" required>

                        @if ($errors->has('avatar'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('avatar') }}</strong>
                        </span>
                        @endif

                    </div>
                </div>
            </div>
            <div class="border-top">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary">Kullanıcı Ekle</button>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection
@section('css')

@endsection
@section('js')

@endsection