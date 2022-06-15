<?php
include 'header.php';
require 'functions.php';

$data1 = detailData("tb_pengadaan_header", "kd_pengadaan", $_GET['kode_pengadaan'])[0];
$data2 = detailDataRelationship("tb_pengadaan_header", "tb_pengadaan_header.kd_pengadaan", $_GET['kode_pengadaan'], "tb_pengadaan_detail", "tb_pengadaan_detail.kd_pengadaan", "tb_pengadaan_header.kd_pengadaan");

?>

<!-- Content Wrapper -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">

            <!-- Awal Baris -->

            <div class="row mb-2">
                <div class="col sm-6">
                    <h1 class="m-0">HALAMAN Detail Pengadaan Barang</h1>
                </div>
                <div class="col sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index">Home</a></li>
                        <li class="breadcrumb-item active">Halaman Detail Pengadaan Barang</li>
                    </ol>
                </div>
            </div>

            <!-- Tutup Baris -->
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Detail Data Pengadaan Barang</h3>
                        </div>

                        <div class="card-body">
                            <div class="card-body">
                                <a href="tambah_pengadaan_detail?kode_pengadaan=<?= $data1['kd_pengadaan'] ?>" class="btn btn-block btn-primary"> Tambah Data Pengadaan Detail </a>
                                <table id="example1" class="table table-bordered table-hover mt-3">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Kode Barang</th>
                                            <th>Stok Masuk</th>
                                            <th>Harga Masuk</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($data2 as $rows) :
                                        ?>
                                            <tr>
                                                <th scope="row"><?= $i; ?></th>
                                                <td><?= $rows["kd_barang"]; ?></td>
                                                <td><?= $rows["stok_masuk"]; ?></td>
                                                <td><?= number_format($rows["harga_masuk"], 0, '.', '.'); ?></td>
                                                <td>
                                                    <a href="ubah_pengadaan_detail?kode_pengadaan=<?= $rows['kd_pengadaan'] ?>&kode_barang=<?= $rows["kd_barang"]; ?>" class="btn btn-warning btn-xs">Ubah</a>
                                                    <a href="delete_pengadaan_detail?kode_pengadaan=<?= $rows['kd_pengadaan'] ?>&kode_barang=<?= $rows["kd_barang"]; ?>" class="btn btn-danger btn-xs">Hapus</a>
                                                </td>
                                            </tr>
                                        <?php
                                            $i++;
                                        endforeach;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="heading-1">Last Update : <?= date("h:i:sa - D, d M Y") ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<?php
include 'footer.php'
?>