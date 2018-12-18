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
            {!! Form::open( [ 'route' => 'yazilar.store','method' => 'POST', 'class' => 'form-horizontal']) !!}
            <div class="card-body">
                <h4 class="card-title">Kategoriler</h4>
                <div class="form-group row">
                    <label for="logo" class="col-sm-3 text-right control-label col-form-label">Kategori Seçin</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="up_id" id="">
                            <option value="" selected>Kategori Seçin</option>

                            @foreach( $categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="title" class="col-sm-3 text-right control-label col-form-label">Kategori Başlık</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="desc" class="col-sm-3 text-right control-label col-form-label">Kategori Açıklama</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="description" name="description">
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    @include('sweetalert::alert')
@endsection