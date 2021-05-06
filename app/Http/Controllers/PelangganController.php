<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggans = Member::paginate(5);

        return view('pelanggan.index', compact('pelanggans'));
    }

    public function create()
    {
        return view('pelanggan.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'telepon' => ['required', 'string'],
            'jenis_kelamin' => ['required']
        ]);

        $pelanggan = Member::create([
            'nama' => $request['nama'],
            'alamat' => $request['alamat'],
            'telepon' => $request['telepon'],
            'jenis_kelamin' => $request['jenis_kelamin'],
        ]);

        return redirect()->route('pelanggan')->with('success', 'Data berhasil Di Tambah');
    }

    public function show($id)
    {
        $pelanggans = Member::where('id', $id)->first();
        return view('pelanggan.detail', compact('pelanggans'));
    }

    public function edit($id)
    {
        $pelanggans = Member::where('id', $id)->first();

        return view('pelanggan.edit', compact('pelanggans'));
    }

    public function update($id, Request $request)
    {
        $pelanggan = Member::where('id', $id)->update([
            'nama' => $request['nama'],
            'telepon' => $request['telepon'],
            'alamat' => $request['alamat'],
            'jenis_kelamin' => $request['jenis_kelamin'],
        ]);

        return redirect()->route('pelanggan')->with('success', 'Data berhasil Di Update');
    }

    public function destroy($id)
    {
        Member::destroy($id);
        return redirect()->route('pelanggan')->with('eror', 'Data berhasil Di Hapus');
    }
}
