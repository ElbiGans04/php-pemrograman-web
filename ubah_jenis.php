<?php
include 'header.php';
require 'functions.php';

$tb_jenis = detailData("tb_jenis", "kd_jenis", $_GET['kode_jenis']);

if (isset($_POST["submit"])) {
  if (ubah($_POST, "tb_jenis")) {
    echo "<script>alert('Data berhasil diubah !!'); window.location = 'tampil_jenis'</script>";
  } else {
    echo "<script>alert('Data gagal diubah !!'); window.location = 'tampil_jenis'</script>";
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
            <li class="breadcrumb-item"><a href="index">Home</a></li>
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
                  if (isset($tb_jenis[0])) :
                  ?>
                    <input id="kode_jenis" type="hidden" value="<?= isset($tb_jenis[0]) ? $tb_jenis[0]['kd_jenis'] : "UNKNOWN" ?>" class="form-control" name="kode_jenis">

                    <div class="form-group">
                      <label for="nama_jenis">Nama Jenis</label>
                      <input id="nama_jenis" type="text" value="<?= isset($tb_jenis[0]) ? $tb_jenis[0]['nama_jenis'] : "UNKNOWN" ?>" class="form-control" name="nama_jenis">
                    </div>

                    <div class="form-group">
                      <button type="submit" name="submit" class="btn btn-primary">Update</button>
                    </div>

                  <?php
                  else :
                  ?>
                    <h1>Jenis Tidak ditemukan (unknown)</h1>
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