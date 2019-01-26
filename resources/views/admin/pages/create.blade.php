@extends('admin.template')
@section('content')
    <div class="row-fluid">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href='{{route('sayfalar.index')}}'>Sayfalar</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Ekle</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            {!! Form::open( [ 'route' => 'sayfalar.store','method' => 'POST', 'class' => 'form-horizontal']) !!}
            <div class="card-body">
                <h4 class="card-title">Sayfa Ekle</h4>
                <div class="form-group row">
                    <label for="title" class="col-sm-3 text-right control-label col-form-label">Sayfa Başlık</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="title" >
                        @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="editor" class="col-sm-3 text-right control-label col-form-label">İçerik</label>
                    <div class="col-sm-9">
                        <textarea type="text" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" name="content" id="editor"></textarea>
                        @if ($errors->has('content'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('content') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="border-top text-right">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">ekle</button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('css')

@endsection
@section('js')
    <!-- ckeditor-->
    <script src="/admin/ckeditor5/ckeditor.js"></script>
    <script src="/admin/ckeditor5/translations/tr.js"></script>
    <script src='/js/ckeditor-option.js'></script>
@endsection