@extends('admin.template')
@section('content')
    <div class="row-fluid">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrum10">
                            <ol class="breadcrumb">

                                @can('users.admin')
                                    <li class="breadcrumb-item"><a href='{{route('kullanicilar.index')}}'>Kullanıcılar</a></li>
                                @endcan

                                <li class="breadcrumb-item active" aria-current="page">Düzenle</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            {!! Form::model( $user ,[ 'route' => ['kullanicilar.update',$user->id ],'method' => 'PUT', 'class' => 'form-horizontal', 'files' => 'true'] ) !!}
            <div class="card-body">
                <h4 class="card-title">Kullanıcı Düzenle: <small class="text-danger">{{ $user->name }} </small></h4>
                <div class="form-group row mt-4">
                    <div class="col-sm-3">
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label for="avatar" class="col-sm-12 control-label col-form-label">Mevcut Resim</label>
                                <div class="card border-dark  mb-3" style="max-width: 18rem;">
                                    <div class="card-body text-dark text-center">
                                        <a href="/{{ $user->avatar }}" data-lightbox="{{ $user->avatar }}" data-title="">
                                            <img src="/{{ $user->avatar }}" class="rounded img-fluid m-2"  width="200" height="200" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="col-sm-9">

                            @can('users.admin')
                                <div class="form-group row">
                                    <label for="role_id" class="col-sm-2 control-label col-form-label">Yetki</label>
                                    <div class="col-sm-10">
                                        <select id="role_id" class="form-control" name="role_id" >

                                            @switch($user->role_id)
                                                @case(1)
                                                <option value='1' selected>Standart</option>
                                                <option value='2' class="text-primary">Moderatör</option>
                                                <option value='3' class="text-success">Admin</option>
                                                    @break
                                                @case(2)
                                                <option value='2' class="text-primary" selected>Moderatör</option>
                                                <option value='3' class="text-success" >Admin</option>
                                                <option value='1' >Standart</option>
                                                    @break
                                                @case(3)
                                                <option value='3' class="text-success" selected>Admin</option>
                                                <option value='2' class="text-primary">Moderatör</option>
                                                <option value='1' >Standart</option>
                                                    @break
                                            @endswitch

                                        </select>
                                    </div>
                                </div>
                            @endcan

                            <div class="form-group row">
                                <label for="title" class="col-sm-2 control-label col-form-label">Kullanıcı Adı</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" value="{{ $user->name }}">

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 control-label col-form-label">E-mail adresi</label>
                                <div class="col-sm-10">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"  value="{{ $user->email }}" >

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="avatar" class="col-sm-2 control-label col-form-label">Profil Resmi</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control{{ $errors->has('avatar') ? ' is-invalid' : '' }}" id="avatar" name="avatar" >

                                    @if ($errors->has('avatar'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('avatar') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-2 control-label col-form-label">Parola</label>
                                <div class="col-sm-10">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"  >

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password-confirm" class="col-sm-2 control-label col-form-label"> Tekrar Parola</label>
                                <div class="col-sm-10">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="border-top">
                <div class="card-body text-right">
                    <button type="submit" class="btn btn-primary">güncelle</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('css')
    <!-- lightbox2-->
    <link rel="stylesheet" href="/admin/lightbox2/dist/css/lightbox.css">
@endsection
@section('js')
    <!-- lightbox js-->
    <script src="/admin/lightbox2/dist/js/lightbox.js"></script>
    <script src="/js/lightbox2-option.js"></script>
@endsection