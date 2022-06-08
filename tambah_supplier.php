<?php

include 'header.php';
require 'functions.php';

if (isset($_POST["submit"])) {
  if (tambah($_POST, "tb_supplier")) {
    echo "<script>alert('Data berhasil ditambahkan !!'); window.location = 'tampil_supplier.php'</script>";
  } else {
    echo "<script>alert('Data gagal ditambahkan !!'); window.location = 'tampil_supplier.php'</script>";
  }
}

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
              <h3 class="card-title">Tambah Supplier</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama_supplier">Nama Supplier</label>
                    <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" autocomplete="off" required>
                  </div>

                  <div class="form-group">
                    <label for="alamat_supplier">Alamat Supplier</label>
                    <textarea rows="3" type="number" class="form-control" id="alamat_supplier" name="alamat_supplier" autocomplete="off" required></textarea>
                  </div>

                  <div class="form-group">
                    <label for="nomor_telephone">Nomor Telephone</label>
                    <input type="number" class="form-control" id="nomor_telephone" name="nomor_telephone" autocomplete="off" required>
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