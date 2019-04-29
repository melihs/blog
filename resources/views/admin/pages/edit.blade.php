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
                                <li class="breadcrumb-item active" aria-current="page">Düzenle</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <form onsubmit="return editAjax('{{ route('sayfalar.update',$page->id) }}','Sayfa güncellendi.');" id="ajax-form" action="{{ route('sayfalar.update',$page->id) }}" method="PUT" class="form-horizontal">
            <div class="card-body">
                <h4 class="card-title">Sayfa Düzenle: <small class="text-danger">{{ $page->title }} </small></h4>
                <div class="form-group row mt-4">
                    <label for="title" class="col-sm-2 control-label col-form-label">Sayfa Başlık</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" name="title" value="{{ $page->title }}">

                        @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif

                    </div>
                </div>
                <div class="form-group row">
                    <label for="editor" class="col-sm-2 control-label col-form-label">İçerik</label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" id="editor" name="content">{{strip_tags($page->content)}}</textarea>

                        @if ($errors->has('content'))
                            <span class="invalid-feedback" role="alert">
                               <strong>{{ $errors->first('content') }}</strong>
                            </span>
                        @endif

                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body text-right">
                        <button type="submit" class="btn btn-primary">Güncelle</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection
@section('css')
    <!-- lightbox css-->
    <link rel="stylesheet" href="/admin/lightbox2/dist/css/lightbox.css">
@endsection
@section('js')
    <!-- lightbox  js-->
{{--    <script src="/admin/lightbox2/dist/js/lightbox.js"></script>--}}
{{--    <script src="/admin/lightbox2/option.js"></script>--}}
    <!-- ckeditor-->
{{--    <script src="/admin/ckeditor5/ckeditor.js"></script>--}}
{{--    <script src="/admin/ckeditor5/translations/tr.js"></script>--}}
{{--    <script src='/js/ckeditor-option.js'></script>--}}
    <script src="/js/editAjax.js"></script>
@endsection