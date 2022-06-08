<?php
include 'header.php';
require 'functions.php';

$data = detailData("tb_supplier", "kd_supplier", $_GET['kode_supplier']);
?>

<!-- Content Wrapper -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">

            <!-- Awal Baris -->

            <div class="row mb-2">
                <div class="col sm-6">
                    <h1 class="m-0">HALAMAN Supplier</h1>
                </div>
                <div class="col sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Halaman Supplier</li>
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
                            <h3 class="card-title">Detail Data Supplier</h3>
                        </div>

                        <div class="card-body">
                            <div class="card-body">
                                <?php
                                if (isset($data[0])) :
                                ?>
                                    <div class="form-group">
                                        <label for="kd_supplier">Kode Supplier</label>
                                        <input type="text" value="<?= isset($data[0]) ? $data[0]['kd_supplier'] : "UNKNOWN" ?>" class="form-control" readonly="readonly">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_supplier">Nama Supplier</label>
                                        <input type="text" value="<?= isset($data[0]) ? $data[0]['nama_supplier'] : "UNKNOWN" ?>" class="form-control" readonly="readonly">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea rows="5" class="form-control" readonly="readonly"><?= isset($data[0]) ? $data[0]['alamat'] : "UNKNOWN" ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_telephone">Nomor Telephone</label>
                                        <input type="text" value="<?= isset($data[0]) ? $data[0]['no_telephone'] : "UNKNOWN" ?>" class="form-control" readonly="readonly">
                                    </div>

                                <?php
                                else :
                                ?>
                                    <h1>Supplier Tidak ditemukan (unknown)</h1>
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