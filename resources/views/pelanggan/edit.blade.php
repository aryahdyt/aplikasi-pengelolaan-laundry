@extends('partial.master')

@section('title')
Update Data Outlet
@endsection

@section('content')
<div class="row">
    <div class="col-lg-7 m-auto">
        <form action="/pelanggan/{{ $pelanggans->id }}" method="post">
            @csrf
            @method('PUT')
            <div class="input-group mb-3">
                <input id="nama" type="text" class="form-control" name="nama"
                    value="{{ old('nama', $pelanggans->nama) }}" required autocomplete="nama" autofocus
                    placeholder="Nama Outlet">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-store"></span>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <input id="telepon" type="number" class="form-control" name="telepon"
                    value="{{ old('telepon', $pelanggans->telepon) }}" required placeholder="Telepon Member">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-phone"></span>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <textarea name="alamat" id="" cols="30" class="form-control"
                    placeholder="Alamat Member">{{ $pelanggans->alamat }}</textarea>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-map-marked-alt"></span>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <select name="jenis_kelamin" id="" class="form-control">
                    <option value="{{ $pelanggans->jenis_kelamin }}">
                        @if ($pelanggans->jenis_kelamin == "L")
                        {{ __('Laki-Laki') }}
                        @else
                        {{ __('Perempuan') }}
                        @endif
                    </option>
                    <option value="L">Laki- Laki</option>
                    <option value="P">Perempuan</option>
                </select>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-genderless"></span>
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