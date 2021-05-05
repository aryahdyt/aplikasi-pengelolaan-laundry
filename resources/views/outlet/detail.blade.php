@extends('partial.master')

@section('title')
Detail Outlet
@endsection

@section('content')
<div class="container">
    <div class="row  text-capitalize">
        <div class="col-lg-3 col-6">
            <h2 class="text-primary"><i class="fas fa-store mr-1"></i>{{ $outlets->nama }}</h2>
            <div class="row">
                <h6 class="col-lg-4 col-5"><i class="fas fa-map-marked-alt mx-1"></i>{{ $outlets->alamat }}</h6>
                <h6 class="col-lg-8 col-7 "><i class="fas fa-phone mx-1"></i>{{ $outlets->telepon }}</h6>
            </div>
        </div>
    </div>
    <a href="javascript:void(0)" onclick="window.history.back();" class="btn btn-outline-primary mt-5"><i
            class="fas fa-arrow-left"></i></a>
</div>
@endsection