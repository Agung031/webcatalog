<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LokasiBarang extends Model
{
    protected $table = "lokasi_barang";

    public function barang(){
        return $this->hasOne('App\Models\DataBarang');
    }
}
