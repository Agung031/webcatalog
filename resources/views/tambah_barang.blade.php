<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <title>Data Barang</title>
    </head>
    <body>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                    <strong>TAMBAH DATA BARANG</strong>
                </div>
                <div class="card-body">
                    <a href="/data_barang" class="btn btn-primary">Kembali</a>
                    <br/>
                    <br/>
                    
                    <form method="post" action="/tambah_barang/store" enctype="multipart/form-data">

                        {{ csrf_field() }}

                        <div class="form-group">
                            <label>Gambar Barang</label>
                            </br>
                            <input type="file" name="image">
                        </div>

                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control" placeholder="Nama barang ...">

                            @if($errors->has('nama_barang'))
                                <div class="text-danger">
                                    {{ $errors->first('nama_barang')}}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label>Lokasi Barang</label>
                            <select name="lokasi_barang" id="lokasi_barang" class="form-control ">
                            <option value="">== Pilih Lokasi Barang ==</option>
                                @foreach ($lokasi as $id => $name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>

                             @if($errors->has('lokasi_barang'))
                                <div class="text-danger">
                                    {{ $errors->first('Lokasi')}}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label>Stock Barang</label>
                            <input type="text" name="stock_barang" class="form-control" placeholder="Stock barang ...">

                            @if($errors->has('stock_barang'))
                                <div class="text-danger">
                                    {{ $errors->first('stock_barang')}}
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