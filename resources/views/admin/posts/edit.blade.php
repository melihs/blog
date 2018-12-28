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
                                <li class="breadcrumb-item active" aria-current="page">Düzenle</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            {!! Form::model($post,['route' => ['yazilar.update',$post->id],'method' =>'PUT','files' =>'true','class' => 'form-horizontal']) !!}
            <div class="card-body">
                <h4 class="card-title">İçerik Düzenle: <small class="text-danger">{{ $post->title }} </small></h4>
                <div class="form-group row">
                    <label for="logo" class="col-sm-3 text-right control-label col-form-label">Kategori Seçin</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="category_id" id="">
                            <option value="{{ $post->category->id }}" selected>{{ $post->category->title }}</option>

                            @foreach( $categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-sm-3 text-right control-label col-form-label">İçerik Başlık</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" name="title" value="{{ $post->title }}">

                        @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif

                    </div>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-sm-3 text-right control-label col-form-label">İçerik Resmi</label>
                    <div class="col-sm-9">
                            <div class="card border-dark  mb-3" style="max-width: 18rem;">
                                <div class="card-header">İçerik Resmi</div>
                                <div class="card-body text-dark text-center">
                                    <a href="/{{ $post->image }}" data-lightbox="{{ $post->image }}" data-title="">
                                        <img src="/{{ $post->image }}" class="rounded img-fluid m-2" width="200" height="200" alt="">
                                    </a>
                                    <input type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" id="image" name="image" >

                                    @if ($errors->has('image'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="editor" class="col-sm-3 text-right control-label col-form-label">İçerik</label>
                    <div class="col-sm-9">
                        <textarea type="text" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" id="editor" name="content">{{$post->content}}</textarea>

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
                    <button type="submit" class="btn btn-primary">Güncelle</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" href="/admin/lightbox2/dist/css/lightbox.css">
@endsection
@section('js')
    <!-- lightbox -->
    <script src="/admin/lightbox2/dist/js/lightbox.js"></script>
    <script src="/admin/lightbox2/option.js"></script>
    <!-- ckeditor -->
    <script src="/admin/ckeditor5/ckeditor.js"></script>
    <script src="/admin/ckeditor5/translations/tr.js"></script>
    <script src="/admin/ckeditor5/option.js"></script>
@endsection