@extends('partial.master')

@section('title')
Data Master Outlet
@endsection

@section('content')
<div class="container">

    <table id="example2" class="table table-bordered table-responsive-lg table-hover text-capitalize">
        <thead>
            <tr>
                <th style="width: 10px">No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($outlets as $no => $outlet)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $outlet->nama }}</td>
                <td>{{ $outlet->alamat }}</td>
                <td>{{ $outlet->telepon }}</td>
                <td style="width: 20%" class="text-center">
                    <a href="/transaksi/outlet/{{$outlet->id}}" class="btn btn-success btn-block text-uppercase">
                        pilih</i>
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" align="center"><a href="{{ route('pelanggan') }}">Daftarkan Pelanggan Terlebih
                        Dahulu</a></td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <a href="javascript:void(0)" onclick="window.history.back();" class="btn btn-outline-primary"><i
            class="fas fa-arrow-left"></i></a>
</div>
@endsection