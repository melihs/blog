@extends('admin.template')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Anasayfa</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Yorumlar</li>
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
                            <h4 class="card-title">Yorum Yönetimi</h4>
                            <div class="table-responsive">
                                <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="zero_config" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="zero_config_info">
                                                <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 5%;">ID</th>
                                                    <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" style="width: 100px;">Yazan</th>
                                                    <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" style="width: 282.6px;">Yorum</th>
                                                    <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" style="width: 200px;">İçerik</th>
                                                    <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" style="width: 90px;">Tarih</th>
                                                    <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" style="width: 5%;">Durum</th>
                                                    <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" style="width: 5%;">Düzenle</th>
                                                    <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" style="width: 5%;">Sil</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @foreach( $comments as $comment)
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1 text-center font-bold">{{ $comment->id }}</td>
                                                        <td>{{ $comment->user->name }}</td>
                                                        <td>{{ str_limit(strip_tags($comment->comment),$limit = 60, $end = '...') }}</td>
                                                        <td>{{ $comment->post->title }}</td>
                                                        <td class="text-center">{{ date_format($comment->created_at,'d m Y') }}</td>
                                                        <td>

                                                            @if($comment->status === '0')
                                                                <a href="{{ route('yorumlar.confirm',$comment->id) }}" class="btn btn-success" style="width:92px;">Onayla</a>
                                                            @else
                                                            <a href="{{ route('yorumlar.dontConfirm',$comment->id) }}" class="btn btn-danger">Onaylama</a>
                                                            @endif

                                                        </td>
                                                        <td class="text-center"><a href="{{ route('yorumlar.edit',$comment->id) }}"  class="btn btn-warning"><i class="mdi mdi-settings"></i></a></td>
                                                        {!! Form::model($comment, ['route' => ['yorumlar.destroy', $comment->id ], 'method' => 'delete']) !!}
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
    <script>
        $(function () {
            $('#zero_config').DataTable(
                {
                    "language": {
                        "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Turkish.json"
                    },
                    "lengthMenu": [25, 50, 75, 100, 125],
                    "pageLength": 25,
                    "order": [[ 1, "asc" ]],
                }
            )})
    </script>
@endsection