@extends('admin.template')
@section('content')
    <div class="row-fluid">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="card-title">Kategori Düzenle: <small class="text-danger">{{ $category->title }} </small></h4>
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
            {!! Form::model( $category ,[ 'route' => ['kategoriler.update',$category->id ],'method' => 'PUT', 'class' => 'form-horizontal'] ) !!}
            <div class="card-body">
                <div class="form-group row">
                    <label for="logo" class="col-sm-3 text-right control-label col-form-label">Üst Kategori</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="up_id" id="">
                            <option value="" style="font-weight:bold; color:green;">Ana Kategori</option>
                            @foreach( $all_categories as $all_category)
                                <option value="{{ $all_category->id }}" {{ $all_category->id == old('up_id',$category->up_id) ? 'selected' : '' }}> {{ $all_category->title }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-sm-3 text-right control-label col-form-label">Kategori Başlık</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="title" name="title" value="{{ $category->title }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="desc" class="col-sm-3 text-right control-label col-form-label">Kategori Açıklama</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="description" name="description" value="{{ $category->description }}">
                    </div>
                </div>
            </div>
            <div class="border-top">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary">Kaydet</button>
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