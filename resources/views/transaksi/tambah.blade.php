@extends('partial.master')

@section('title')
Tambah Data Transaksi
@endsection

@section('content')
<div class="row">
    <div class="col-lg-7 m-auto">
        <form method="POST" action="{{ route('simpan-transaksi') }}">
            @csrf
            <div class="input-group mb-3">
                <input id="kode_invoice" type="text" id="disabledTextInput" class="form-control" name="kode_invoice"
                    value="{{ $invoice }}" required placeholder="Kode Invoice" readonly="readonly">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-code"></span>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <select class="form-control text-capitalize" name="outlet" readonly="readonly">
                    <option value="{{ $outlet->id }}">{{ $outlet->nama }}</option>
                </select>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-users"></span>
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
                <select class="form-control text-capitalize" name="paket">
                    <option value="">- Pilih Paket -</option>
                    {{-- @if ($pakets == null)
                    <option value=""><a href="">Buat Paket Anda Di Menu Paket</a></option>
                    @endif --}}
                    @foreach ($pakets as $paket)
                    <option value="{{ $paket->id }}">
                        {{ $paket->nama_paket . '( Rp . '. number_format($paket->harga) . ')' }}
                    </option>
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
                    value="{{ old('biaya_tambahan') }}" placeholder="Biaya Tambahan">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-money-bill-alt"></span>
                    </div>
                </div>
            </div>
            <div class="text-danger text-xs">**Diskon 20% (Jika Total Harga Diatas Rp . 20.000)</div>
            <div class="text-danger text-xs m-0">**Pajak 10%</div>

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