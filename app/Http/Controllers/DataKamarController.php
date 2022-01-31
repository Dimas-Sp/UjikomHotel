<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\tipe_kamar;
use Illuminate\Http\Request;

class DataKamarController extends Controller
{
    public function takeAll(Request $request) 
    {
        $data = tipe_kamar::join('tipe', 'tipe_kamars.id_tipe', '=', 'tipe.id_tipe')
        ->get();
        $request->session()->put('dataKamar', $data[0]);
        $value = $request->session()->get('dataKamar');
        // dd(session());
        return view('admin/datakamar', [
            'data' => $data
        ]);
    }

    public function ubah(Id $id) 
    {
        
        $tipe_kamar = tipe_kamar::join('tipe', 'tipe_kamars.id_tipe', '=', 'tipe.id_tipe')
        ->where('id_kamar', $id)
        ->get();
        return view('admin/tambah', [
            'tipe_kamar'=> $tipe_kamar]);
    }
}
