@extends('admin.template')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Anasayfa</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sayfalar</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Sayfa Yönetimi</h4>
                            <div style="margin:15px 20px 10px; float:right;"><a href="{{ route('sayfalar.create') }}" class="btn btn-success">Sayfa Ekle</a></div>
                            <div class="table-responsive">
                                <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="zero_config" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="zero_config_info">
                                                <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-sort="ascending" style="width: 5%; text-align: center;">ID</th>
                                                    <th class="sorting_asc" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-sort="ascending" style="width: 177px;">Yazı Başlık</th>
                                                    <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" style="width: 135.4px;">İçerik</th>
                                                    <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" style="width: 5%;">Düzenle</th>
                                                    <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" style="width: 5%;">Sil</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @foreach( $pages as $page)
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1 text-center font-bold">{{ $page->id }}</td>
                                                        <td>{{ $page->title }}</td>
                                                        <td>{{ str_limit(strip_tags($page->content),$limit=70,$end='...') }}</td>
                                                        <td class="text-center"><a href="{{ route('sayfalar.edit',$page->id) }}"  class="btn btn-warning"><i class="mdi mdi-settings"></i></a></td>
                                                        {!! Form::model($page, ['route' => ['sayfalar.destroy', $page->id ], 'method' => 'delete']) !!}
                                                        <td class="text-center"><button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button></td>
                                                        {!! Form::close() !!}
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <!-- datatables css -->
    <link href="/admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
@endsection
@section('js')
    <script src="/admin/assets/extra-libs/DataTables/datatables.min.js"></script>
    <script> $('#zero_config').DataTable(); </script>
@endsection