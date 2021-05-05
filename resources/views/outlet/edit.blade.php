@extends('partial.master')

@section('title')
Update Data Outlet
@endsection

@section('content')
<div class="row">
    <div class="col-lg-7 m-auto">
        <form action="/outlet/{{ $outlets->id }}" method="post">
            @csrf
            @method('PUT')
            <div class="input-group mb-3">
                <input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama', $outlets->nama) }}"
                    required autocomplete="nama" autofocus placeholder="Nama Outlet">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-store"></span>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <textarea name="alamat" id="" cols="30" class="form-control"
                    placeholder="Alamat Outlet">{{ $outlets->alamat }}</textarea>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-map-marked-alt"></span>
                    </div>
                </div>
            </div>

            <div class="input-group mb-3">
                <input id="telepon" type="text" class="form-control" name="telepon"
                    value="{{ old('telepon', $outlets->telepon) }}" required autocomplete="telepon" autofocus
                    placeholder="No Telepon">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-phone"></span>
                    </div>
                </div>
            </div>

            {{-- <p class="text-dark text-xs text-capitalize m-0">
                Owner Saat Ini
                <strong>
                    @if ($outlets->user)
                    {{ $outlets->user->name }}
            @else
            {{ __('Belum Ada') }}
            @endif
            </strong>
            </p> --}}
            {{-- <div class="input-group mb-3"> --}}
            {{-- <select class="form-control" name="owner"> --}}
            {{-- <option value="">{{ __('Pilih Untuk Mengganti Owner') }}</option> --}}
            {{-- @if ($outlets->user->outlet_id != null) --}}
            {{-- @foreach ($allOutlets as $outlet) --}}
            {{-- <option value="{{ $outlet->id }}"> --}}
            {{-- @if ($outlet->user) --}}
            {{-- {{ $outlet->user->name . ' (Owner Di Outlet ' . $outlet->nama . ')' }} --}}
            {{-- @else --}}
            {{-- {{ $outlets->user->name . '(Belum Ada Owner Di Outlet ' . $outlet->nama . ')' }} --}}
            {{-- @endif --}}
            {{-- </option> --}}
            {{-- @endforeach --}}
            {{-- @else --}}
            {{-- @foreach ($users as $user)
                    <option value="{{ $user->outlet_id }}">
            {{ $user->name . ' (Owner Di Outlet ' . $user->outlet->nama . ')' }}
            </option>
            @endforeach --}}
            {{-- @endif --}}


            {{-- </select> --}}
            {{-- <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-store"></span>
                </div>
            </div>
            </div> --}}

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