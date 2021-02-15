<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <title>Edit Barang</title>
    </head>
    <body>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                    <strong>EDIT DATA</strong>
                </div>
                <div class="card-body">
                    <a href="/data_barang" class="btn btn-primary">Kembali</a>
                    <br/>
                    <br/>
                    

                    <form method="post" action="/data_barang/update/{{ $data_barang -> id }}" enctype="multipart/form-data">

                        {{ csrf_field() }}

                        <div class="form-group">
                            <Label>Gambar Barang</label>
                            </br>
                            <img width="150px" src="{{ url('/images/'.$data_barang -> image )}}">
                            </br>
                            <input type="file" name="image">
                            <input type="hidden" class="form-control-file" id="img" name="img" value="{{ $data_barang->image }}">
                        </div>

                        <div class="form-group">
                            <label>Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang ..." value=" {{ $data_barang -> nama_barang }}">

                            @if($errors->has('nama_barang'))
                                <div class="text-danger">
                                    {{ $errors->first('nama_barang')}}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label>Lokasi Barang</label>
                            
                                <select name="lokasi_barang" id="lokasi_barang" class="form-control">
                                <option value="{{ $data_barang -> lokasi_barang }}">{{ $data_barang -> lokasi_barang }}</option>
                                    @foreach ($lokasi as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>

                             @if($errors->has('lokasi_barang'))
                                <div class="text-danger">
                                    {{ $errors->first('lokasi_barang')}}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label>Stock Barang</label>
                            <input type="text" name="stock_barang" class="form-control" placeholder="Stock barang ..." value="{{ $data_barang -> stock_barang }}">

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