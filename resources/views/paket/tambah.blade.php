@extends('partial.master')

@section('title')
Tambah Data Paket
@endsection

@section('content')
<div class="row">
    <div class="col-lg-7 m-auto">
        <form method="POST" action="{{ route('simpan-paket') }}">
            @csrf
            <div class="input-group mb-3">
                <input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama') }}" required
                    autocomplete="nama" autofocus placeholder="Nama Paket">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-archive"></span>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <select class="form-control" name="jenis" required>
                    <option value="">- Pilih -</option>
                    <option value="kiloan">Kiloan</option>
                    <option value="selimut">Selimut</option>
                    <option value="bed_cover">Bed Cover</option>
                    <option value="kaos">Kaos</option>
                    <option value="lain">Lain-Lain</option>
                </select>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-archive"></span>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <input id="harga" type="number" class="form-control" name="harga" value="{{ old('harga') }}" required
                    autocomplete="harga" autofocus placeholder="Harga Paket">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-dollar-sign"></span>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <select class="form-control" name="outlet">
                    <option value="">- Pilih -</option>
                    @foreach ($outlets as $outlet)
                    <option value="{{ $outlet->id }}">{{ $outlet->nama }}</option>
                    @endforeach
                </select>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-store"></span>
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