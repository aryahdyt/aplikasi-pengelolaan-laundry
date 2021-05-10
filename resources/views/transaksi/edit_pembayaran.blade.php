@extends('partial.master')

@section('title')
Data Transaksi <small>(belum bayar)</small>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-7 m-auto">
        <form method="post" action="/transaksi/pembayaran/{{ $transaksi->id }}">
            @csrf
            @method('PUT')
            <div class="input-group mb-3">
                <input id="kode_invoice" type="text" id="disabledTextInput" class="form-control" name=""
                    value="{{ $transaksi->kode_invoice }}" required placeholder="Kode Invoice" readonly="readonly">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-code"></span>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <input id="kode_invoice" type="text" id="disabledTextInput" class="form-control" name=""
                    value="{{ $transaksi->member->nama }}" required placeholder="Kode Invoice" readonly="readonly">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-users"></span>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <input id="kode_invoice" type="text" id="disabledTextInput" class="form-control" name=""
                    value="{{ "Rp . " . number_format($transaksi->detail_transaksi->total_harga) }}" required
                    placeholder="Kode Invoice" readonly="readonly">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-dollar-sign"></span>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <input id="total_bayar" type="number" class=" form-control" name="total_bayar"
                    value="{{ old('total_bayar') }}" required placeholder="Jumlah Pembayaran">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-dollar-sign"></span>
                    </div>
                </div>
            </div>

            <div class="row my-2">
                <!-- /.col -->
                <div class="col-4 m-auto">
                    <a href="javascript:void(0)" onclick="window.history.back();" class="btn btn-outline-primary"><i
                            class="fas fa-arrow-left"></i></a>
                    <button type="reset" class="btn bg-gradient-danger">
                        <i class="fas fa-redo"></i>
                    </button>
                    <button type="submit" class="btn bg-gradient-primary">
                        {{ __('Tambah') }}
                    </button>
                </div>
                <!-- /.col -->
            </div>
        </form>
    </div>
</div>
@endsection