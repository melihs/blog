@extends('admin.template')
@section('content')
    <div class="row-fluid">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href='{{route('yorumlar.index')}}'>Yorumlar</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Düzenle</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            {!! Form::model($comment,['route' => ['yorumlar.update',$comment->id],'method' =>'PUT','class' => 'form-horizontal']) !!}
            <div class="card-body">
                <h4 class="card-title">Yorum Düzenle</h4>
                <div class="form-group row">
                    <label for="title" class="col-sm-2 control-label col-form-label">Yorum Sahibi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="title" name="title" value="{{ $comment->user->name }}" disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="editor" class="col-sm-2 control-label col-form-label">Yorum</label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}" id="editor" name="comment">{!! $comment->comment !!}</textarea>

                        @if ($errors->has('comment'))
                            <span class="invalid-feedback" role="alert">
                               <strong>{{ $errors->first('comment') }}</strong>
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