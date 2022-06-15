<?php

include 'header.php';

require 'functions.php';
$jenis = tampilData("tb_jenis");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">HALAMAN BARANG</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index">Home</a></li>
            <li class="breadcrumb-item active">Halaman Barang</li>
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
              <h3 class="card-title">Daftar Jenis</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <a href="tambah_jenis" class="btn btn-block btn-primary"> Tambah Data Jenis </a>
              <table id="example1" class="table table-bordered table-hover mt-3">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Kode Jenis</th>
                    <th>Nama Jenis</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  foreach ($jenis as $rows) :
                  ?>
                    <tr>
                      <th scope="row"><?= $i; ?></th>
                      <td><?= $rows["kd_jenis"]; ?></td>
                      <td><?= $rows["nama_jenis"]; ?></td>
                      <td>
                      <a href="ubah_jenis?kode_jenis=<?= $rows['kd_jenis'] ?>" class="btn btn-warning btn-xs">Ubah</a>
                      <a href="delete_jenis?kode_jenis=<?= $rows['kd_jenis'] ?>" class="btn btn-danger btn-xs">Hapus</a>
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