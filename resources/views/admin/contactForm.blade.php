@extends('admin.template')
@section('content')
    <div class="row-fluid">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href=''>Anasayfa</a></li>
                                <li class="breadcrumb-item active" aria-current="page">İletişim Formu</li>
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
            {!! Form::open( [ 'route' => 'iletisim.send','method' => 'POST', 'class' => 'form-horizontal']) !!}
            <div class="card-body">
                <h4 class="card-title"> İletişim Formu</h4>
                <div class="form-group row">
                    <label for="name" class="col-sm-3 text-right control-label col-form-label">Ad Soyad</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-3 text-right control-label col-form-label">E-posta</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="message" class="col-sm-3 text-right control-label col-form-label">Mesaj </label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="message" name="message" rows="4"></textarea>
                    </div>
                </div>
            </div>
            <div class="border-top">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary">Gönder</button>
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