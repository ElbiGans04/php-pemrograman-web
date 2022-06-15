<?php

include 'header.php';

require 'functions.php';
$buku = tampilData("tb_pengadaan_header");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">HALAMAN Pengadaan Header</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index">Home</a></li>
            <li class="breadcrumb-item active">Halaman Pengadaan Header</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Daftar Pengadaan Header</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <a href="tambah_pengadaan_header" class="btn btn-block btn-primary"> Tambah Data Pengadaan Header </a>
              <table id="example1" class="table table-bordered table-hover mt-3">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Kode Pengadaan</th>
                    <th>Kode Supplier</th>
                    <th>Tanggal Masuk</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  foreach ($buku as $rows) :
                  ?>
                    <tr>
                      <th scope="row"><?= $i; ?></th>
                      <td><?= $rows["kd_pengadaan"]; ?></td>
                      <td><?= $rows["kd_supplier"]; ?></td>
                      <td><?= $rows["tanggal_masuk"]; ?></td>
                      <td>
                      <a href="detail_pengadaan?kode_pengadaan=<?= $rows['kd_pengadaan'] ?>" class="btn btn-primary btn-xs">Tampilkan</a>
                      <a href="ubah_pengadaan_header?kode_pengadaan=<?= $rows['kd_pengadaan'] ?>" class="btn btn-warning btn-xs">Ubah</a>
                      <a href="delete_pengadaan_header?kode_pengadaan=<?= $rows['kd_pengadaan'] ?>" class="btn btn-danger btn-xs">Hapus</a>
                      </td>
                    </tr>
                  <?php
                    $i++;
                  endforeach;
                  ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php

include 'footer.php';

?>