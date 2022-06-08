<?php

include 'header.php';
require 'functions.php';

$tb_supplier = tampilData("tb_supplier");
if (isset($_POST["submit"])) {
  if (tambah($_POST, "tb_pengadaan_header")) {
    echo "<script>alert('Data berhasil ditambahkan !!'); window.location = 'tampil_pengadaan_header.php'</script>";
  } else {
    echo "<script>alert('Data gagal ditambahkan !!'); window.location = 'tampil_pengadaan_header.php'</script>";
  }
  var_dump($_POST);
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">HALAMAN Pengadaan Barang</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Halaman Pengadaan Barang</li>
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
              <h3 class="card-title">Tambah Pengadaan Barang</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label>Supplier</label>
                    <select class="form-control" name="kode_supplier">
                      <option disabled selected>- Silahkan Pilih Jenis -</option>
                      <?php 
                        foreach ($tb_supplier as $jenis) :
                      ?>
                        <option value="<?= $jenis['kd_supplier']?>"><?= $jenis['nama_supplier']?></option>
                      <?php 
                        endforeach;
                      ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="tanggal_masuk">Tanggal Masuk</label>
                    <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk"></input>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
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