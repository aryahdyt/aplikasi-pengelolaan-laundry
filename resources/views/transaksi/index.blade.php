@extends('partial.master')

@section('title')
Data Master Transaksi
@endsection

@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ __('Success ') }}</strong>{{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if(session('eror'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ __('Success ') }}</strong>{{ session('eror') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="container">
    <a href="{{ route('transaksi-cari-outlet') }}" class="btn btn-primary mb-2"><i
            class="fas fa-plus mr-2"></i>Tambah</a>
    <a href="{{ route('konfirmasi-pembayaran') }}" class="btn btn-primary mb-2"><i
            class="fas fa-check mr-2"></i>Konfirmasi Pembayaran</a>

    <table id="example2" class="table table-bordered table-responsive-lg table-hover text-capitalize text-center">
        <thead>
            <tr>
                <th style="width: 10px">No</th>
                <th>kode invoice</th>
                <th>member</th>
                <th>status</th>
                <th>pembayaran</th>
                <th>total harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($transaksis as $no => $transaksi)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $transaksi->kode_invoice }}</td>
                <td>{{ $transaksi->member->nama }}</td>
                <td>@if ($transaksi->status == "baru")
                    <span class="badge badge-warning">Baru</span>
                    @elseif ($transaksi->status == "proses")
                    <span class="badge badge-primary">Proses</span>
                    @elseif ($transaksi->status == "selesai")
                    <span class="badge badge-success">Selesai</span>
                    @elseif ($transaksi->status == "diambil")
                    <span class="badge badge-secondary">Diambil</span>
                    @endif
                </td>
                <td>@if ($transaksi->dibayar == "dibayar")
                    <span class="badge badge-success">dibayar</span>
                    @else
                    <span class="badge badge-danger">belum dibayar</span>
                    @endif</td>
                <td>{{ "Rp . " . number_format($transaksi->detail_transaksi->total_harga) }}</td>
                <td style="width: 20%" class="text-center">
                    <a href="/transaksi/{{$transaksi->id}}/edit" class="btn btn-success btn-block">
                        <i class="far fa-edit"></i>
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" align="center">Data Tidak Ditemukan</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <a href="javascript:void(0)" onclick="window.history.back();" class="btn btn-outline-primary"><i
            class="fas fa-arrow-left"></i></a>
</div>
@endsection