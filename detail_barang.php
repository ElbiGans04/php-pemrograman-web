<?php
include 'header.php';
require 'functions.php';

$data = detailDataRelationship("tb_barang", "tb_barang.kd_barang", $_GET['kode_barang'], "tb_jenis", "tb_jenis.kd_jenis", "tb_barang.kd_jenis");
?>

<!-- Content Wrapper -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">

            <!-- Awal Baris -->

            <div class="row mb-2">
                <div class="col sm-6">
                    <h1 class="m-0">HALAMAN BARANG</h1>
                </div>
                <div class="col sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Halaman Barang</li>
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
                            <h3 class="card-title">Detail Data Barang</h3>
                        </div>

                        <div class="card-body">
                            <div class="card-body">
                                <?php
                                if (isset($data[0])) :
                                ?>
                                    <div class="form-group">
                                        <label for="kode_barang">Kode Barang</label>
                                        <input type="text" value="<?= isset($data[0]) ? $data[0]['kd_barang'] : "UNKNOWN" ?>" class="form-control" readonly="readonly">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_barang">Nama Barang</label>
                                        <input type="text" value="<?= isset($data[0]) ? $data[0]['nama_barang'] : "UNKNOWN" ?>" class="form-control" readonly="readonly">
                                    </div>
                                    <div class="form-group">
                                        <label for="merk">Merk</label>
                                        <input type="text" value="<?= isset($data[0]) ? $data[0]['merk_barang'] : "UNKNOWN" ?>" class="form-control" readonly="readonly">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_jenis">Jenis Barang</label>
                                        <input type="text" value="<?= isset($data[0]) ? $data[0]['nama_jenis'] : "UNKNOWN" ?>" class="form-control" readonly="readonly">
                                    </div>
                                    <div class="form-group">
                                        <label for="satuan_barang">Satuan Barang</label>
                                        <input type="text" value="<?= isset($data[0]) ? $data[0]['satuan_barang'] : "UNKNOWN" ?>" class="form-control" readonly="readonly">
                                    </div>
                                    <div class="form-group">
                                        <label for="harga_satuan">Harga Satuan</label>
                                        <input type="text" value="<?= isset($data[0]) ? $data[0]['harga_satuan'] : "UNKNOWN" ?>" class="form-control" readonly="readonly">
                                    </div>
                                    <div class="form-group">
                                        <label for="stok">Stok Barang</label>
                                        <input type="text" value="<?= isset($data[0]) ? $data[0]['stok'] : "UNKNOWN" ?>" class="form-control" readonly="readonly">
                                    </div>

                                <?php
                                else :
                                ?>
                                    <h1>Barang Tidak ditemukan (unknown)</h1>
                                <?php endif; ?>
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