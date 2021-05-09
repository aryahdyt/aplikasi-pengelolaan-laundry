<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Outlet;
use App\Models\Paket;
use App\Models\Transaksi;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use Carbon\Carbon;


class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $transaksis = Transaksi::paginate(5);

        return view('transaksi.index', compact('transaksis'));
    }

    public function edit($id)
    {
        $transaksis = Transaksi::where('id', $id)->first();

        return view('transaksi.edit', compact('transaksis'));
    }

    public function update($id, Request $request)
    {
        $transaksi = Transaksi::where('id', $id)->update([
            'status' => $request['status'],
        ]);

        return redirect()->route('transaksi')->with('success', 'Data berhasil Di Update');
    }

    public function invoice()
    {
        $tanggal = Carbon::now();
        $removeStrip = Str::remove('-', $tanggal);
        $removeTitik = Str::remove(':', $removeStrip);
        $removeSpace = Str::remove(' ', $removeTitik);
        $removed = $removeSpace;

        return $removed;
        // dd($removed);
    }

    public function tampilOutlet()
    {
        $outlets = Outlet::paginate(5);

        return view('transaksi.outlet', compact('outlets'));
    }

    public function create($id)
    {
        $transaksis = Transaksi::get();
        $pelanggans = Member::get();
        $outlet = Outlet::where('id', $id)->first();
        $pakets = Paket::where('outlet_id', $id)->get();
        $invoice = "DRY" . $this->invoice();
        // dd($pakets);

        return view('transaksi.tambah', compact('transaksis', 'pelanggans', 'outlet', 'pakets', 'invoice'));
    }
}
