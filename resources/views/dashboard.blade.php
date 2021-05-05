@extends('partial.master')

@section('title')
dasboard
@endsection

@section('content')
<div class="row">
    <div class="col-lg-4 col-12">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $countOutlets }}</h3>

                <p class="text-uppercase">{{ __('outlet') }}</p>
            </div>
            <div class="icon">
                <i class="fas fa-store"></i>
            </div>
            <a href="{{ route('outlet') }}" class="small-box-footer">More info <i
                    class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-12">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>150</h3>

                <p class="text-uppercase">{{ __('pelanggan') }}</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-12">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>150</h3>

                <p class="text-uppercase">{{ __('transaksi') }}</p>
            </div>
            <div class="icon">
                <i class="fas fa-money-check-alt"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
@endsection