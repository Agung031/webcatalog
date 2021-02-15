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
                    Data Barang
                </div>
                <div class="card-body">
                    <a href="/data_barang/tambah_barang" class="btn btn-primary">Input Barang Baru</a>
                    <br/>
                    <br/>
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama Barang</th>
                                <th>Lokasi</th>
                                <th>Stock</th>
                                <th>OPSI</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no=1; ?>
                        @foreach ($data_barang as $b)
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><img width="150px" src="{{ url('/images/'.$b->image )}}"></td>
                                <td>{{ $b -> nama_barang }}</td>
                                <td>{{ $b -> lokasi_barang }}</td>
                                <td>{{ $b -> stock_barang }}</td>
                                <td>
                                    <a href="/data_barang/edit/{{ $b->id }}" class="btn btn-warning">Edit</a>
                                    <a href="/data_barang/tambah_stock/{{ $b->id }}" class="btn btn-primary">Tambah Stock</a>
                                    <a href="/data_barang/kurang_stock/{{ $b->id }}" class="btn btn-secondary">Kurangi Stock</a>
                                    <a href="/data_barang/hapus/{{ $b->id }}" class="btn btn-danger" onclick="return confirm('Anda yakin mau menghapus item ini ?')">Hapus</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>