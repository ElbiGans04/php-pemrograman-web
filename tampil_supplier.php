<?php

include 'header.php';

require 'functions.php';
$data = tampilData("tb_supplier");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">HALAMAN Supplier</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Halaman Supplier</li>
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
              <h3 class="card-title">Daftar Supplier</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <a href="tambah_supplier.php" class="btn btn-block btn-primary"> Tambah Data Supplier </a>
              <table id="example1" class="table table-bordered table-hover mt-3">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama Supplier</th>
                    <th>Alamat</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  foreach ($data as $rows) :
                  ?>
                    <tr>
                      <th scope="row"><?= $i; ?></th>
                      <td><?= $rows["nama_supplier"]; ?></td>
                      <td><?= $rows["alamat"]; ?></td>
                      <td>
                      <a href="detail_supplier.php?kode_supplier=<?= $rows['kd_supplier'] ?>" class="btn btn-primary btn-xs">Tampilkan</a>
                      <a href="ubah_supplier.php?kode_supplier=<?= $rows['kd_supplier'] ?>" class="btn btn-warning btn-xs">Ubah</a>
                      <a href="delete_supplier.php?kode_supplier=<?= $rows['kd_supplier'] ?>" class="btn btn-danger btn-xs">Hapus</a>
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