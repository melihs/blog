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
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
                {!! Form::model( $settings , [ 'route' => [ 'ayarlar.update', 1 ],'method' => 'PUT', 'files' => 'true', 'class' => 'form-horizontal'] ) !!}
                <div class="card-body">
                    <h4 class="card-title">Site Ayarları</h4>
                    <div class="form-group row">
                        <label for="title" class="col-sm-3 text-right control-label col-form-label">Site Başlık</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="title" name="title" value="{{$settings->title}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="desc" class="col-sm-3 text-right control-label col-form-label">Site Açıklama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="description" name="description" value="{{$settings->description}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 text-right control-label col-form-label">e-posta</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="email" name="email" value="{{$settings->email}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="logo" class="col-sm-3 text-right control-label col-form-label">Site Logo</label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control" id="logo" name="logo">
                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Güncelle</button>
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