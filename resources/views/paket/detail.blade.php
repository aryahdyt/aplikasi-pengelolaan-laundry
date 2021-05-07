@extends('partial.master')

@section('title')
Detail Paket
@endsection

@section('content')
<div class="container">
    <div class="text-capitalize">
        <h5>{{ __('Nama Paket : ') }}<strong>{{ $pakets->nama_paket }}</strong></h5>
        <hr>
        <h5>{{ __('Jenis paket : ') }}<strong>{{ $pakets->jenis }}</strong></h5>
        <hr>
        <h5>{{ __('Harga paket : ') }}<strong>{{ 'Rp . ' . number_format($pakets->harga) }}</strong></h5>
        <hr>
        <h5>{{ __('Ada Di Outlet : ') }}<strong>{{ $pakets->outlet->nama }}</strong></h5>
    </div>
    <a href="javascript:void(0)" onclick="window.history.back();" class="btn btn-outline-primary mt-5"><i
            class="fas fa-arrow-left"></i></a>
</div>
@endsection