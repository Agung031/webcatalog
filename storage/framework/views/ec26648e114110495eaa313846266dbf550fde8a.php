<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
        <title>Data Barang</title>
        <style type="text/css">
            .button {
                position: relative;
                right: 0;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                    Data Barang
                </div>
                <div class="card-body">
                    <a href="/barang/tambah" class="btn btn-primary">Input Barang Baru</a>
                    <br/>
                    <br/>
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Lokasi</th>
                                <th>Stock</th>
                                <th>OPSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $data_barang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php for($i=1; ;$i++){ ?>
                            <tr>
                                <td> <?php echo $i ?></td>
                            <?php } ?>
                                <td><?php echo e($b->nama_barang); ?></td>
                                <td><?php echo e($b->lokasi_barang); ?></td>
                                <td><?php echo e($b->stock_barang); ?></th>
                                <td>
                                    <a href="/barang/edit/<?php echo e($b->id); ?>" class="btn btn-warning">Edit</a>
                                    <a href="/barang/hapus/<?php echo e($b->id); ?>" class="btn btn-danger">Hapus</a>
                                    <a href="/barang/pindah_lokasi/<?php echo e($b->id); ?>" class="btn btn-primary">Pindah Lokasi</a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <div class="button">
                        <a href="/barang/tambah_stock" class="btn btn-primary">Tambah Stock</a>
                        <a href="/barang/kurang_stock" class="btn btn-warning">Kurangi Stock</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html><?php /**PATH /var/www/html/tes/resources/views/data_barang.blade.php ENDPATH**/ ?>