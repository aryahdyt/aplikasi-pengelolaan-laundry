@extends('partial.master')

@section('title')
Tambah Data Pengguna
@endsection

@section('content')
<div class="row">
    <div class="col-lg-7 m-auto">
        <form method="POST" action="{{ route('simpan-pengguna') }}">
            @csrf
            <div class="input-group mb-3">
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required
                    autocomplete="name" autofocus placeholder="Name">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required
                    autocomplete="email" placeholder="Email">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input id="password" type="password" class="form-control" name="password" autocomplete="new-password"
                    placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <select class="form-control" name="level" required>
                    <option value="">- Pilih -</option>
                    <option value="admin">admin</option>
                    <option value="owner">owner</option>
                    <option value="kasir">kasir</option>
                </select>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user-tag"></span>
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