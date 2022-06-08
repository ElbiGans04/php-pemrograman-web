<?php
include 'header.php';
require 'functions.php';

$tb_supplier = detailData("tb_supplier", "kd_supplier", $_GET['kode_supplier']);

if (isset($_POST["submit"])) {
  if (ubah($_POST, "tb_supplier")) {
    echo "<script>alert('Data berhasil diubah !!'); window.location = 'tampil_supplier.php'</script>";
  } else {
    echo "<script>alert('Data gagal diubah !!'); window.location = 'tampil_supplier.php'</script>";
  }
}

?>

<!-- Content Wrapper -->
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">

      <!-- Awal Baris -->

      <div class="row mb-2">
        <div class="col sm-6">
          <h1 class="m-0">HALAMAN Jenis</h1>
        </div>
        <div class="col sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Halaman Jenis</li>
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
              <h3 class="card-title">Ubah Data Jenis</h3>
            </div>

            <div class="card-body">
              <form action="" method="post">
                <div class="card-body">
                  <?php
                  if (isset($tb_supplier[0])) :
                  ?>
                    <input id="kode_supplier" type="hidden" value="<?= isset($tb_supplier[0]) ? $tb_supplier[0]['kd_supplier'] : "UNKNOWN" ?>" class="form-control" name="kode_supplier">

                    <div class="form-group">
                      <label for="nama_supplier">Nama Supplier</label>
                      <input id="nama_supplier" type="text" value="<?= isset($tb_supplier[0]) ? $tb_supplier[0]['nama_supplier'] : "UNKNOWN" ?>" class="form-control" name="nama_supplier">
                    </div>

                    <div class="form-group">
                      <label for="alamat_supplier">Alamat</label>
                      <textarea rows="3" id="alamat_supplier" type="text"  class="form-control" name="alamat_supplier"><?= isset($tb_supplier[0]) ? $tb_supplier[0]['alamat'] : "UNKNOWN" ?></textarea>
                    </div>

                    <div class="form-group">
                      <label for="nomor_telephone">Nomor Telephone</label>
                      <input id="nomor_telephone" type="text" value="<?= isset($tb_supplier[0]) ? $tb_supplier[0]['no_telephone'] : "UNKNOWN" ?>" class="form-control" name="nomor_telephone">
                    </div>

                    <div class="form-group">
                      <button type="submit" name="submit" class="btn btn-primary">Update</button>
                    </div>

                  <?php
                  else :
                  ?>
                    <h1>Supplier Tidak ditemukan (unknown)</h1>
                  <?php endif; ?>
                </div>
              </form>
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