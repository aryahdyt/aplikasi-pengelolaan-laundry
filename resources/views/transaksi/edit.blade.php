@extends('partial.master')

@section('title')
Update Data Transaksi
@endsection

@section('content')
<div class="row">
    <div class="col-lg-7 m-auto">
        <form action="/transaksi/{{ $transaksis->id }}" method="post">
            @csrf
            @method('PUT')
            <div class="input-group mb-3">
                <input id="kode_invoice" type="text" class="form-control" name="kode_invoice"
                    value="{{ old('kode_invoice', $transaksis->kode_invoice) }}" required placeholder="Kode Invoice"
                    readonly="readonly">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-receipt"></span>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <input id="outlet" type="text" class="form-control" name="outlet"
                    value="{{ old('outlet', $transaksis->outlet->nama) }}" required placeholder="Outlet"
                    readonly="readonly">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-store"></span>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <input id="member" type="text" class="form-control" name="member"
                    value="{{ old('member', $transaksis->member->nama) }}" required placeholder="Pelanggan"
                    readonly="readonly">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-users"></span>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <input id="jenis" type="text" class="form-control" name="jenis"
                    value="{{ old('jenis', $transaksis->detail_transaksi->paket->nama_paket) }}" required
                    placeholder="Jenis" readonly="readonly">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-archive"></span>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <input id="jumlah" type="text" class="form-control" name="jumlah"
                    value="{{ "Jumlah : " . $transaksis->detail_transaksi->qty }}" required placeholder="jumlah"
                    readonly="readonly">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-grip-vertical"></span>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <input id="jumlah" type="text" class="form-control" name="jumlah"
                    value="{{ "Diskon : Rp . " . number_format($transaksis->diskon) }}" required placeholder="jumlah"
                    readonly="readonly">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-percent"></span>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <input id="jumlah" type="text" class="form-control" name="jumlah"
                    value="{{ "Pajak : Rp . " . number_format($transaksis->pajak) }}" required placeholder="jumlah"
                    readonly="readonly">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-grip-vertical"></span>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <input id="total_harga" type="text" class="form-control" name="total_harga"
                    value="{{ 'Total Harga : Rp. ' . number_format($transaksis->detail_transaksi->total_harga) }}"
                    placeholder="total harga" readonly="readonly">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-dollar-sign"></span>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <input id="total_bayar" type="text" class="form-control" name="total_bayar"
                    value="{{ 'Total Bayar : Rp. ' . number_format($transaksis->detail_transaksi->total_bayar) }}"
                    required placeholder="total bayar" readonly="readonly">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-money-bill"></span>
                    </div>
                </div>
            </div>

            <div class="input-group">
                <select class="form-control" name="status" required>
                    <option value="{{ $transaksis->status }}">{{ $transaksis->status }}</option>
                    <option value="baru">baru</option>
                    <option value="proses">proses</option>
                    <option value="selesai">selesai</option>
                    <option value="diambil">diambil</option>
                </select>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-tasks"></span>
                    </div>
                </div>
            </div>
            <p class="text-muted text-xs mb-3">Klik Tombol Update Untuk Menyimpan Perubahan Transaksi</p>

            <div class="row my-2">
                <!-- /.col -->
                <div class="col-4 m-auto">
                    <a href="javascript:void(0)" onclick="window.history.back();" class="btn btn-outline-primary"><i
                            class="fas fa-arrow-left"></i></a>
                    <button type="reset" class="btn bg-gradient-danger">
                        <i class="fas fa-redo"></i>
                    </button>
                    <button type="submit" class="btn bg-gradient-primary">
                        {{ __('Update') }}
                    </button>
                </div>
                <!-- /.col -->
            </div>
        </form>
    </div>
</div>
@endsection