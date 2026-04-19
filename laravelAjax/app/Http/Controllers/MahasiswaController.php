<?php

namespace App\Http\Controllers;

class MahasiswaController extends Controller
{
    public function index()
    {
        return view('mahasiswa_index');
    }

    public function getData()
    {
        $path = storage_path('app/json/mahasiswa.json');

        if (!file_exists($path)) {
            return response()->json([
                'error' => 'File tidak ditemukan'
            ], 404);
        }

        $content = file_get_contents($path);
        $data = json_decode($content, true);

        return response()->json($data);
    }
}