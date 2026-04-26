<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $data = Mahasiswa::all();
        return view('mahasiswa.index', compact('data'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        Mahasiswa::create($request->all());
        return redirect('/mahasiswa');
    }

    public function edit($id)
    {
        $mhs = Mahasiswa::find($id);
        return view('mahasiswa.edit', compact('mhs'));
    }

    public function update(Request $request, $id)
    {
    $mhs = Mahasiswa::find($id);

    $mhs->update([
        'nama' => $request->nama,
        'nim' => $request->nim,
        'jurusan' => $request->jurusan
    ]);
    return redirect('/mahasiswa');
    }

    public function destroy($id)
    {
        Mahasiswa::find($id)->delete();
        return redirect('/mahasiswa');
    }
}