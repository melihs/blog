@extends('admin.template')
@section('content')
    <div class="row-fluid">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href='{{route('admin.index')}}'>Anasayfa</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Ayarlar</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
                {!! Form::model( $settings , [ 'route' => [ 'ayarlar.update', 1 ],'method' => 'PUT', 'files' => 'true', 'class' => 'form-horizontal'] ) !!}
                <div class="card-body">
                    <h4 class="card-title">Site Ayarları</h4>
                    <div class="form-group row mt-4">
                        <div class="col-sm-3">
                            <div class="form-group row">
                                <label for="avatar" class="col-sm-6 text-right control-label col-form-label">Profil Resmi</label>
                                <div class="col-sm-12">
                                    <div class="card border-dark  mb-3" style="max-width: 18rem;">
                                        <div class="card-body text-dark text-center">
                                            <a href="/{{ $setting->logo }}" data-lightbox="{{ $setting->logo }}" data-title="">
                                                <img src="/{{ $setting->logo }}" class="rounded img-fluid m-2"  width="200" height="200" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group row">
                                <label for="title" class="col-sm-2 control-label col-form-label">Site Başlık</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="title" value="{{$settings->title}}">

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-sm-2 control-label col-form-label">Site Açıklama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" id="description" name="description" value="{{$settings->description}}">

                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 control-label col-form-label">e-posta</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" value="{{$settings->email}}">

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="logo" class="col-sm-2 control-label col-form-label">Site Logo</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control{{ $errors->has('logo') ? ' is-invalid' : '' }}" id="logo" name="logo">

                                    @if ($errors->has('logo'))
                                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('logo') }}</strong>
                            </span>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border-top text-right">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Güncelle</button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('css')
 {{-- todo: paralo güncelleme işlemi yapılacak --}}
@endsection
@section('js')

@endsection