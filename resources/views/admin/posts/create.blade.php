@extends('admin.template')
@section('content')
    <div class="row-fluid">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href='{{route('yazilar.index')}}'>İçerikler</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Ekle</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            {!! Form::open( [ 'route' => 'yazilar.store','method' => 'POST', 'class' => 'form-horizontal', 'files' => 'true']) !!}
            <div class="card-body">
                <h4 class="card-title">İçerik Ekle</h4>
                <div class="form-group row">
                    <label for="category_id" class="col-sm-3 text-right control-label col-form-label">Kategori Seçin</label>
                    <div class="col-sm-9">
                        <select class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id" id="category_id" >
                            <option value="" selected>Kategori Seçin</option>

                            @foreach( $categories as $category)

                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach

                        </select>

                        @if ($errors->has('category_id'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('category_id') }}</strong>
                            </span>
                        @endif

                    </div>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-sm-3 text-right control-label col-form-label">İçerik Başlık</label>
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
                    <label for="image" class="col-sm-3 text-right control-label col-form-label">İçerik Resmi</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" id="image" name="image">

                        @if ($errors->has('image'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('image') }}</strong>
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
            </div>
            <div class="border-top">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary">ekle</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection
@section('css')

@endsection
@section('js')
    <!-- ckeditor -->
    <script src="/admin/ckeditor5/ckeditor.js"></script>
    <script src="/admin/ckeditor5/translations/tr.js"></script>
    <script src="/admin/ckeditor5/option.js"></script>
@endsection