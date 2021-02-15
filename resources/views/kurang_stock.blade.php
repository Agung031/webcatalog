<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <title>Kurang Stock</title>
    </head>
    <body>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                    <strong>KURANGI STOCK</strong>
                </div>
                <div class="card-body">
                    <a href="/data_barang" class="btn btn-primary">Kembali</a>
                    <br/>
                    <br/>
                    

                    <form method="post" action="/data_barang/proses_kurang/{{ $data_barang -> id }}">

                        {{ csrf_field() }}

                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control" value="{{ $data_barang -> nama_barang }}" disabled>
                        </div>

                        <div class="form-group">
                            <label>Lokasi Barang</label>
                            <select name="lokasi_barang" id="lokasi_barang" class="form-control" disabled>
                                <option value="{{ $data_barang -> lokasi_barang }}">{{ $data_barang -> lokasi_barang }}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Stock Barang</label>
                            <input type="text" name="stock_barang" class="form-control" value="{{ $data_barang -> stock_barang }}" disabled>
                        </div>

                        <div class="form-group">
                            <label>Jumlah Stock yang Dikurangi</label>
                            <input type="text" name="kurang_stock" class="form-control" placeholder="Jumlah Stock ...">

                            @if($errors->has('kurang_stock'))
                                <div class="text-danger">
                                    {{ $errors->first('kurang_stock')}}
                                </div>
                            @endif
                            
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>