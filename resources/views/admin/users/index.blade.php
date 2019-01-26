@extends('admin.template')
@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Anasayfa</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Kullanıcılar</li>
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
                            <h4 class="card-title">Kullanıcı Yönetimi</h4>
                            <div style="margin:15px 20px 10px; float:right;"><a href="{{ route('kullanicilar.create') }}" class="btn btn-success">Kullanıcı Ekle</a></div>
                            <div class="table-responsive">
                                <div id="zero_config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="zero_config" class="table table-striped table-bordered dataTable" role="grid" aria-describedby="zero_config_info">
                                                <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" aria-sort="ascending" style="width: 177px;">Kullanıcı Adı</th>
                                                    <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" style="width: 282.6px;">Kullanıcı e-posta</th>
                                                    <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" style="width: 13%;">Kullanıcı Yetki</th>
                                                    <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" style="width: 5%;">Düzenle</th>
                                                    <th class="sorting" tabindex="0" aria-controls="zero_config" rowspan="1" colspan="1" style="width: 5%;">Sil</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @foreach( $users as $user)
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">{{ $user->name }}</td>
                                                        <td>{{ $user->email }}</td>

                                                        @if($user->role === '1')
                                                            <td class="text-success text-center"><i class="mdi mdi-account-star"></i> Admin</td>
                                                        @else
                                                            <td class="text-secondary text-center"><i class="mdi mdi-account"></i> Standart</td>
                                                        @endif

                                                        <td class="text-center"><a href="{{ route('kullanicilar.edit',$user->id) }}"  class="btn btn-warning"><i class="mdi mdi-settings"></i></a></td>
                                                        {!! Form::model($user, ['route' => ['kullanicilar.destroy', $user->id ], 'method' => 'delete']) !!}
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