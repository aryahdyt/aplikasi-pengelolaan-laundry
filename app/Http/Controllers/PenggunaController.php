<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::paginate(5);
        // dd($users);
        return view('pengguna.index', compact('users'));
    }

    public function create()
    {
        $outlets = Outlet::get();
        return view('pengguna.tambah', compact('outlets'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users', 'max:255'],
            'level' => ['required', 'string'],
        ]);

        $pengguna = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'level' => $request['level'],
            'outlet_id' => $request['outlet'],
        ]);

        return redirect()->route('pengguna')->with('success', 'Data berhasil Di Tambah');
    }

    public function edit($id)
    {
        $users = User::where('id', $id)->first();
        $outlets = Outlet::get();

        return view('pengguna.edit', compact('users', 'outlets'));
    }

    public function update($id, Request $request)
    {
        if ($request['password'] != null) {
            $update = User::where('id', $id)->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'level' => $request['level'],
                'outlet_id' => $request['outlet'],
            ]);
        } else {
            $update = User::where('id', $id)->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'level' => $request['level'],
                'outlet_id' => $request['outlet'],
            ]);
        }

        return redirect()->route('pengguna')->with('success', 'Data berhasil Di Update');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('pengguna')->with('eror', 'Data berhasil Di Hapus');
    }
}
