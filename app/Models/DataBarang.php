<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBarang extends Model
{
    protected $table = "data_barang";
    protected $fillable = ['nama_barang','lokasi_barang','stock_barang','image'];

    public function lokasi(){
        return $this->belongsTo('App\Models\LokasiBarang', 'lokasi_barang_id');
    }
}
