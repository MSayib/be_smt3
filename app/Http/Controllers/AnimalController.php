<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index()
    {
        return 'Menampilkan data hewan';
    }

    public function store(Request $request)
    {
        // return 'Menambahkan data hewan: ' . $request->nama;
        return response()->json([
            'message' => 'Menambahkan data hewan: ' . $request->nama,
            'data' => $request->all()
        ]);
    }

    public function update(Request $request)
    {
        echo 'Nama: ' . $request->nama;
        echo '<br>';
        echo 'id: ' . $request->id;
        echo '<br>';
        echo 'Berhasil';
    }

    public function destroy($id)
    {
        return 'Menghapus data hewan: ' . $id;
    }
}
