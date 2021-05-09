@extends('partial.master')

@section('title')
Tambah Data Transaksi
@endsection

@section('content')
<div class="row">
    <div class="col-lg-7 m-auto">
        <form method="POST" action="{{ route('simpan-pelanggan') }}">
            @csrf
            <div class="input-group mb-3">
                <input id="kode_invoice" type="text" class="form-control" name="kode_invoice"
                    value="{{ old('kode_invoice', $invoice) }}" required placeholder="total harga" disabled>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-code"></span>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <input id="outlet" type="text" class="form-control" name="outlet"
                    value="{{ old('outlet', $outlet->nama) }}" required placeholder="total harga" disabled>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-store"></span>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <select class="form-control text-capitalize" name="pelanggan">
                    <option value="">- Pilih Pelanggan -</option>
                    @foreach ($pelanggans as $pelanggan)
                    <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama }}</option>
                    @endforeach
                </select>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-users"></span>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <select class="form-control text-capitalize" name="outlet">
                    <option value="">- Pilih Paket -</option>
                    {{-- @if ($pakets == null)
                    <option value=""><a href="">Buat Paket Anda Di Menu Paket</a></option>
                    @endif --}}
                    @foreach ($pakets as $paket)
                    <option value="{{ $paket->id }}">{{ $paket->nama_paket }}</option>
                    @endforeach
                </select>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-archive"></span>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <input id="jumlah" type="number" class="form-control" name="jumlah" value="{{ old('jumlah') }}" required
                    placeholder="Jumlah">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-hand-paper"></span>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <input id="biaya_tambahan" type="number" class="form-control" name="biaya_tambahan"
                    value="{{ old('biaya_tambahan') }}" required placeholder="Biaya Tambahan">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-money-bill-alt"></span>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <input id="diskon" type="number" class="form-control" name="diskon" value="{{ old('diskon') }}" required
                    placeholder="Diskon">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-percent"></span>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <input id="pajak" type="number" class="form-control" name="pajak" value="{{ old('pajak') }}" required
                    placeholder="Pajak">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-hand-holding-usd"></span>
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