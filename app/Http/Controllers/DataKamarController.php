<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\tipe_kamar;
use Illuminate\Http\Request;

class DataKamarController extends Controller
{
    //Function Untuk mengambil semua Data
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


    //function Untuk mengupdate data
    public function ubah($id) 
    {
        
        $tipe_kamar = tipe_kamar::join('tipe', 'tipe_kamars.id_tipe', '=', 'tipe.id_tipe')
        ->where('id_kamar', $id)
        ->get();
        return view('admin/ubah', [
            'tipe_kamar'=> $tipe_kamar]);
    }
    public function update (Request $request) 
    {
        $simpan = tipe_kamar::where('id_kamar', $request->id_kamar)->update([
                  'id_tipe' => $request->id_tipe,
                  'jml_kamar' => $request->jml_kamar
                  ]);
                return redirect('/kamar/{$id}');
    }


    //Function Untuk Menambahkan Data
    public function tambah() 
    {
        return view('admin/tambahData');
        
    }
    
    public function store(Request $request) 
    {
        // dd($_POST['gambar_tipekamar']);
        tipe_kamar::insert([
            'id_tipe' => $request->id_tipe,
            'jml_kamar' => $request->jml_kamar,
            'gambar_tipekamar' => $request->gambar_tipekamar
            
        ]);
        return redirect('/kamar/{$id}');
    }


    //function untuk melihat keterangan data dan menghapus data
    // public function lihat($id)
    // {
    //    return view('/admin/lihatDetail');
    // }
    
}
