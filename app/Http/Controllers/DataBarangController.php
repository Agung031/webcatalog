<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataBarang;

class DataBarangController extends Controller
{
    public function index(){
        $data_barang = DataBarang::all();
        return view('data_barang',['data_barang' => $data_barang]);
    }
}
