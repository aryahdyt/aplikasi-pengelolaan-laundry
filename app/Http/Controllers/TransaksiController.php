<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

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
}
