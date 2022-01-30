<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\tipe_kamar;
use Illuminate\Http\Request;

class DataKamarController extends Controller
{
    public function takeAll() {
        $data = tipe_kamar::join('tipe', 'tipe_kamars.id_tipe', '=', 'tipe.id_tipe')
        ->get();
        return view('datakamar', [
            'data' => $data
        ]);
    }
}
