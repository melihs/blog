@extends('admin.template')
@section('content')
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Sales Cards  -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- Column -->
            <div class="col-md-6 col-lg-2 col-xlg-3">
                <div class="card card-hover">
                    <a href="{{ route('homepage') }}" target="_blank">
                        <div class="box bg-cyan text-center">
                            <h1 class="font-light text-white"><i class="mdi mdi-home"></i></h1>
                            <h6 class="text-white">Site Anasayfa</h6>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection()
@section('css')

    @endsection()
@section('js')

    @endsection()