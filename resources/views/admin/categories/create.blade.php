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
                                <li class="breadcrumb-item active" aria-current="page">Ekle</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <form onsubmit="return addAjax();" id="ajax-form" action="{{ route('kategoriler.store') }}" method="POST" class="form-horizontal">
                <div class="card-body">
                    <h4 class="card-title"> Yeni Kategori Ekle</h4>
                    <div class="form-group row">
                        <label for="up_id" class="col-sm-3 text-right control-label col-form-label">Üst Kategori</label>
                        <div class="col-sm-9">
                            <select id="up_id" class="form-control" name="up_id" >
                            <option value="" selected>Üst kategori</option>

                        @foreach( $categories as $category)
                             <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach

                        </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-sm-3 text-right control-label col-form-label">Kategori Başlık</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ old('title') }}" id="title" name="title">

                            @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-3 text-right control-label col-form-label">Kategori Açıklama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" value="{{ old('description') }}" id="description" name="description">

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
                    <button type="submit" class="btn btn-primary">ekle</button>
                </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('css')

@endsection
@section('js')
    <script>
        function addAjax() {
            let form = $("#ajax-form");
            let form_data = $("#ajax-form").serialize();
            $.ajaxSetup({
              headers : {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $.ajax({
                type    : 'POST',
                url     : '{{ route('kategoriler.store') }}',
                data    : form_data,
                success : function () {
                    swal({
                       title  : 'Kategori eklendi.',
                        text  : 'Lütfen Bekleyin...',
                        type  : 'success',
                        timer : 2000,
                        showConfirmButton: false
                    });
                    document.getElementById('ajax-form').reset();
                }
            });
            return false;
        }
    </script>

@endsection