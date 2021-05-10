@extends('partial.master')

@section('title')
Data Yang Belum Bayar
@endsection

@section('content')
<div class="container">

    <table id="example2" class="table table-bordered table-responsive-lg table-hover text-capitalize">
        <thead>
            <tr>
                <th style="width: 10px">No</th>
                <th>Invoice</th>
                <th>Member</th>
                <th>Status</th>
                <th>Total Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($transaksis as $no => $transaksi)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $transaksi->kode_invoice }}</td>
                <td>{{ $transaksi->member->nama }}</td>
                <td>{{ $transaksi->status }}</td>
                <td>{{ "Rp . " . number_format($transaksi->detail_transaksi->total_harga) }}</td>
                <td style="width: 20%" class="text-center">
                    <a href="/transaksi/pembayaran/{{$transaksi->id}}" class="btn btn-success btn-block text-uppercase">
                        pilih</i>
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" align="center">Data Tidak Ditemukan</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <a href="javascript:void(0)" onclick="window.history.back();" class="btn btn-outline-primary"><i
            class="fas fa-arrow-left"></i></a>
</div>
@endsection