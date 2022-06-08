<?php

include 'header.php';
require 'functions.php';

$tb_jenis = tampilData("tb_jenis");
if (isset($_POST["submit"])) {
  if (tambah($_POST, "tb_barang")) {
    echo "<script>alert('Data berhasil ditambahkan !!'); window.location = 'tampil_barang.php'</script>";
  } else {
    echo "<script>alert('Data gagal ditambahkan !!'); window.location = 'tampil_barang.php'</script>";
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
          <h1 class="m-0">HALAMAN Barang</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
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
              <h3 class="card-title">Tambah Barang</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" autocomplete="off" required>
                  </div>

                  <div class="form-group">
                    <label>Jenis</label>
                    <select class="form-control" name="jenis_barang">
                      <option disabled selected>- Silahkan Pilih Jenis -</option>
                      <?php 
                        foreach ($tb_jenis as $jenis) :
                      ?>
                        <option value="<?= $jenis['kd_jenis']?>"><?= $jenis['nama_jenis']?></option>
                      <?php 
                        endforeach;
                      ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="merk_barang">Merk Barang</label>
                    <input type="text" class="form-control" id="merk_barang" name="merk_barang"></input>
                  </div>

                  <div class="form-group">
                    <label for="satuan_barang">Satuan Barang</label>
                    <input type="text" class="form-control" id="satuan_barang" name="satuan_barang"></input>
                  </div>

                  <div class="form-group">
                    <label for="harga_satuan">Harga Satuan</label>
                    <input type="number" class="form-control" id="harga_satuan" name="harga_satuan"></input>
                  </div>

                  <div class="form-group">
                    <label for="stok_barang">Stok Barang</label>
                    <input type="number" class="form-control" id="stok_barang" name="stok_barang"></input>
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