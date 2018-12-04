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
                {!! Form::model( $settings , [ 'route' => [ 'ayarlar.update', $settings->id ],'method' => 'put', 'files' => 'true', 'class' => 'form-horizontal']) !!}
                <div class="card-body">
                    <h4 class="card-title">Site Ayarları</h4>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Site Başlık</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="title" value="{{$settings->title}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Site Açıklama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="desc" value="{{$settings->description}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">e-posta</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="email" value="{{$settings->email}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email1" class="col-sm-3 text-right control-label col-form-label">Site Logo</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" id="logo" >
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="button" class="btn btn-primary">Güncelle</button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('css')

@endsection
@section('js')

@endsection