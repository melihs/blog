@extends('admin.template')
@section('content')
    <div class="row-fluid">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href='{{route('kategoriler.index')}}'>Kategoriler</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Düzenle</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <form onsubmit="return editAjax('{{ route('kategoriler.update',$category->id) }}','kategori güncellendi.');" id="ajax-form" action="{{ route('kategoriler.update',$category->id) }}" method="PUT" class="form-horizontal">
                <div class="card-body">
                    <h4 class="card-title">Kategori Düzenle: <small class="text-danger">{{ $category->title }} </small></h4>
                    <div class="form-group row mt-4">
                        <label for="logo" class="col-sm-2 control-label col-form-label">Üst Kategori</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="up_id" id="">
                                <option value="" style="font-weight:bold; color:green;">Ana Kategori</option>
                                @foreach( $all_categories as $all_category)
                                    <option value="{{ $all_category->id }}" {{ $all_category->id == old('up_id',$category->up_id) ? 'selected' : '' }}> {{ $all_category->title }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-sm-2 control-label col-form-label">Kategori Başlık</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" name="title" value="{{ $category->title }}">

                            @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-2 control-label col-form-label">Kategori Açıklama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" id="description" name="description" value="{{ $category->description }}">

                            @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="border-top">
                    <div class="card-body text-right">
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('css')
@endsection
@section('js')
    <script src="/js/editAjax.js"></script>
@endsection