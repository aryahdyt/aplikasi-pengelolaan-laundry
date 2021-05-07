<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function index()
    {
        $pakets = Paket::paginate(5);

        return view('paket.index', compact('pakets'));
    }

    public function create()
    {
        $outlets = Outlet::get();
        return view('paket.tambah', compact('outlets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required'],
            'jenis' => ['required'],
            'harga' => ['required'],
            'outlet' => ['required'],
        ]);

        $outlet = Paket::create([
            'nama_paket' => $request['nama'],
            'jenis' => $request['jenis'],
            'harga' => $request['harga'],
            'outlet_id' => $request['outlet'],
        ]);

        return redirect()->route('paket')->with('success', 'Data berhasil Di Tambah');
    }

    public function show($id)
    {
        $pakets = Paket::where('id', $id)->first();
        return view('paket.detail', compact('pakets'));
    }

    public function edit($id)
    {
        $pakets = Paket::where('id', $id)->first();
        $outlets = Outlet::get();

        return view('paket.edit', compact('pakets', 'outlets'));
    }

    public function update($id, Request $request)
    {
        $paket = Paket::where('id', $id)->update([
            'nama_paket' => $request['nama'],
            'jenis' => $request['jenis'],
            'harga' => $request['harga'],
            'outlet_id' => $request['outlet'],
        ]);

        return redirect()->route('paket')->with('success', 'Data berhasil Di Update');
    }

    public function destroy($id)
    {
        Paket::destroy($id);
        return redirect()->route('paket')->with('eror', 'Data berhasil Di Hapus');
    }
}
