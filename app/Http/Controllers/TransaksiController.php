<?php

namespace App\Http\Controllers;

use App\Models\Detail_transaksi;
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
        // dd();

        return view('transaksi.tambah', compact('transaksis', 'pelanggans', 'outlet', 'pakets', 'invoice'));
    }

    public function store(Request $request)
    {
        // dd($request['kode_invoice']);
        // $request->validate([
        //     'kode_invoice' => ['required', 'unique:transaksis', 'max:255'],
        //     'pelanggan' => ['required', 'string'],
        //     'paket' => ['required', 'string'],
        //     'jumlah' => ['required'],
        //     'biaya_tambahan' => ['required'],
        //     'diskon' => ['required'],
        //     'pajak' => ['required'],
        // ]);

        $harga_paket = Paket::where('id', $request['paket'])->first('harga');

        // biaya tambahan
        if ($request['biaya_tambahan'] == null) {
            $biaya_tambahan = 0;
        } else {
            $biaya_tambahan = $request['biaya_tambahan'];
        }
        // paket kali jumlah
        $total_harga = $harga_paket->harga  * $request['jumlah'];
        // biaya tambahan
        $total_harga = $total_harga + $biaya_tambahan;

        // diskon
        if ($total_harga >= 20000) {
            $diskon = $total_harga * 0.2; // 5000
            $diskon = (int)$diskon;
        } else {
            $diskon = 0;
        }


        // cari pajak
        $pajak = $total_harga * 0.1; //2500
        $pajak = (int)$pajak;

        // total bayar
        $total_harga = $total_harga - $diskon + $pajak;

        // dd($total_bayar);

        $transaksi = Transaksi::create([
            'kode_invoice' => $request['kode_invoice'],
            'outlet_id' => $request['outlet'],
            'member_id' => $request['pelanggan'],
            'tgl' => Carbon::now(),
            'batas_waktu' => Carbon::now()->addDays(7),
            'biaya_tambahan' => $biaya_tambahan,
            'diskon' => $diskon,
            'pajak' => $pajak,
            'user_id' => $request['pelanggan'],
            'status' => 'baru',
            'dibayar' => 'belum_dibayar',
        ]);
        $detail_transaksi = Detail_transaksi::create([
            'transaksi_id' => $transaksi->id,
            'paket_id' => $request['paket'],
            'qty' => $request['jumlah'],
            'total_harga' => $total_harga,
        ]);


        return redirect()->route('transaksi')->with('success', 'Data berhasil Di Tambah');
    }

    public function tabel_pembayaran()
    {
        $transaksis = Transaksi::where('dibayar', 'belum_dibayar')->paginate(5);
        // dd($transaksis);
        return view('transaksi.tabel_pembayaran', compact('transaksis'));
    }

    public function edit_pembayaran($id)
    {
        $transaksi = Transaksi::where('id', $id)->get()->first();

        return view('transaksi.edit_pembayaran', compact('transaksi'));
    }

    public function update_pembayaran($id, Request $request)
    {
        $pembayaran = Detail_transaksi::where('transaksi_id', $id)->update([
            'total_bayar' => $request['total_bayar'],
        ]);
        $transaksi = Transaksi::where('id', $id)->update([
            'dibayar' => 'dibayar',
            'tgl_pembayaran' => Carbon::now(),
        ]);

        return redirect()->route('transaksi')->with('success', 'Pembayran Berhasil');
    }
}
