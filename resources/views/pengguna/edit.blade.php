@extends('partial.master')

@section('title')
Update Data Pengguna
@endsection

@section('content')
<div class="row">
    <div class="col-lg-7 m-auto">
        <form action="/pengguna/{{ $users->id }}" method="post">
            @csrf
            @method('PUT')
            <div class="input-group mb-3">
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $users->name) }}"
                    required autocomplete="name" autofocus placeholder="Name">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <input id="email" type="email" class="form-control" name="email"
                    value="{{ old('email', $users->email) }}" required autocomplete="email" placeholder="Email">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>

            <div class="input-group">
                <input id="password" type="password" class="form-control" name="password" autocomplete="new-password"
                    placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <p class="text-danger text-xs mb-3">Kosongkan saja jika tidak akan mengubah password</p>

            <div class="input-group mb-3">
                <select class="form-control" name="level" required>
                    <option value="{{ $users->level }}">{{ $users->level }}</option>
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
                    <option value="{{ $users->outlet_id }}">
                        @if ($users->outlet)
                        {{ $users->outlet->nama }}
                        @endif
                    </option>
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
                        {{ __('Update') }}
                    </button>
                </div>
                <!-- /.col -->
            </div>
        </form>
    </div>
</div>
@endsection