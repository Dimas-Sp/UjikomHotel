<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\fasilitas_kamar;

class DatFasKamarController extends Controller
{
    public function index()
    {
        $data["siswa"] = fasilitas_kamar::all();
        dd($data);
        return view('admin/datafaskamar', $data);
    }

}
