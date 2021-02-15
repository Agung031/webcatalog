<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataBarang;
use App\Models\LokasiBarang;
use File;

class DataBarangController extends Controller
{
    public function index(){
        $data_barang = DataBarang::all();
        return view('data_barang',['data_barang' => $data_barang]);
    }

    public function tambah(){
        $lokasi = LokasiBarang::pluck('lokasi','id');
        return view('tambah_barang',['lokasi' => $lokasi]);
    }

    public function store(Request $request){
        $this->validate($request,[
            'nama_barang' => 'required',
            'lokasi_barang' => 'required',
            'stock_barang' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ]);
        
        if($request->lokasi_barang == 1){
            $lokasi = "GUDANG";
        }else{
            $lokasi = "TOKO";
        };

        $resource = $request->file('image');
        $name = time()."_".$resource->getClientOriginalName();
        $penyimpanan = 'images';
        $resource->move($penyimpanan,$name);

        DataBarang::create([
            'nama_barang' => $request->nama_barang,
            'lokasi_barang' => $lokasi,
            'stock_barang' => $request->stock_barang,
            'image' => $name,
        ]);

        return redirect('/data_barang');
    }

    public function edit($id){
        $data_barang = DataBarang::find($id);
        $lokasi = LokasiBarang::pluck('lokasi','id');
        return view('/edit_barang',[
            'data_barang' => $data_barang,
            'lokasi' => $lokasi,
        ]);
    }

    public function update($id, Request $request){
        $this->validate($request,[
            'nama_barang' => 'required',
            'lokasi_barang' => 'required',
            'stock_barang' => 'required|numeric',
        ]);

        if($request->lokasi_barang == 1){
            $lokasi = "GUDANG";
        }else{
            $lokasi = "TOKO";
        };

        $img_old = $request->img;
        $resource = $request->file('image');

        if($resource != ''){
            File::delete('images/'.$img_old);

            $name = time()."_".$resource->getClientOriginalName();
            $penyimpanan = 'images';
            $resource->move($penyimpanan,$name);
        }else{
            $name = $img_old;
        };
        
        $data_barang = DataBarang::find($id);
        $data_barang->nama_barang = $request->nama_barang;
        $data_barang->lokasi_barang = $lokasi;
        $data_barang->stock_barang = $request->stock_barang;
        $data_barang->image = $name;
        $data_barang->save();

        return redirect('/data_barang');
    }

    public function tambah_stock($id,Request $request){
        $data_barang = DataBarang::find($id);
        $lokasi = LokasiBarang::pluck('lokasi','id');
        return view('/tambah_stock',[
            'data_barang' => $data_barang,
            'lokasi' =>$lokasi,
            ]);
    }

    public function proses_tambah($id, Request $request){
        $data_barang = DataBarang::find($id);
        $this->validate($request,[
            'tambah_stock' => 'required|numeric',
        ]);

        if($request->lokasi_barang == 1){
            $lokasi = "GUDANG";
        }else{
            $lokasi = "TOKO";
        };

        $stock = $data_barang->stock_barang;
        $tambah_stock = $request->tambah_stock;
        $sisa_stock = $stock + $tambah_stock;

        $data_barang->stock_barang = $sisa_stock;
        $data_barang->save();

        return redirect('/data_barang');
    }

    public function kurang_stock($id,Request $request){
        $data_barang = DataBarang::find($id);
        $lokasi = LokasiBarang::pluck('lokasi','id');
        return view('/kurang_stock',[
            'data_barang' => $data_barang,
            'lokasi' =>$lokasi,
            ]);
    }

    public function proses_kurang($id, Request $request){
        $message = ['required' => 'Jumlah Stok Tidak Mencukupi'];
        $data_barang = DataBarang::find($id);
        $this->validate($request,[
            'kurang_stock' => 'required|numeric',
        ]);

        if($request->lokasi_barang == 1){
            $lokasi = "GUDANG";
        }else{
            $lokasi = "TOKO";
        };

        $stock = $data_barang->stock_barang;
        $kurang_stock = $request->kurang_stock;
        $sisa_stock = $stock - $kurang_stock;

        if($kurang_stock > $stock){
            echo '<script>alert("Jumlah Kurang Stok Tidak Boleh Lebih Besar Dari Stock yang Ada");</script>';
            return view('/kurang_stock',['data_barang' => $data_barang,]);
        }else{
            $data_barang->stock_barang = $sisa_stock;
            $data_barang->save();
            return redirect('/data_barang');
        }

    }

    public function hapus($id){
        $data_barang = DataBarang::find($id);
        File::delete("images/".$data_barang->image);
        $data_barang->delete();

        return redirect('/data_barang');
    }
}