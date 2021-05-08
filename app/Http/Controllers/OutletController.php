<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\User;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $outlets = Outlet::paginate(5);

        return view('outlet.index', compact('outlets'));
    }

    public function create()
    {
        return view('outlet.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'telepon' => ['required', 'string'],
        ]);

        $outlet = Outlet::create([
            'nama' => $request['nama'],
            'alamat' => $request['alamat'],
            'telepon' => $request['telepon'],
        ]);

        return redirect()->route('outlet')->with('success', 'Data berhasil Di Tambah');
    }

    public function show($id)
    {
        $outlets = Outlet::where('id', $id)->first();
        return view('outlet.detail', compact('outlets'));
    }

    public function edit($id)
    {
        $outlets = Outlet::where('id', $id)->first();
        // dd($outlets);
        // $allOutlets = Outlet::get();
        // dd($allOutlets);
        // $users = User::get()->where('level', 'owner');

        return view('outlet.edit', compact('outlets'));
    }

    public function update($id, Request $request)
    {
        // if ($request['owner'] != null) {
        //     $outlet = Outlet::where('id', $id)->update([
        //         'nama' => $request['nama'],
        //         'alamat' => $request['alamat'],
        //         'telepon' => $request['telepon'],
        //     ]);
        //     $user = User::where('outlet_id', $id)->where('level', 'owner')->update(['outlet_id' => $request['owner']]);
        // }

        $outlet = Outlet::where('id', $id)->update([
            'nama' => $request['nama'],
            'alamat' => $request['alamat'],
            'telepon' => $request['telepon'],
        ]);

        return redirect()->route('outlet')->with('success', 'Data berhasil Di Update');
    }

    public function destroy($id)
    {
        Outlet::destroy($id);
        return redirect()->route('outlet')->with('eror', 'Data berhasil Di Hapus');
    }
}
