<?php
include 'header.php';
require 'functions.php';

$tb_pengadaan = detailData("tb_pengadaan_header", "tb_pengadaan_header.kd_pengadaan", $_GET['kode_pengadaan']);
$tb_supplier = tampilData("tb_supplier");


if (isset($_POST["submit"])) {
  // var_dump($_POST);
  if (ubah($_POST, "tb_pengadaan_header")) {
    echo "<script>alert('Data berhasil diubah !!'); window.location = 'tampil_pengadaan_header'</script></script>";
  } else {
    echo "<script>alert('Data gagal diubah !!'); window.location = 'tampil_pengadaan_header'</script></script>";
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
          <h1 class="m-0">HALAMAN Pengadaan Header</h1>
        </div>
        <div class="col sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index">Home</a></li>
            <li class="breadcrumb-item active">Halaman Pengadaan Header</li>
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
              <h3 class="card-title">Ubah Data Pengadaan Header</h3>
            </div>

            <div class="card-body">
              <form action="" method="post">
                <div class="card-body">
                  <?php
                  if (isset($tb_pengadaan[0])) :
                  ?>
                    <input id="kode_pengadaan" type="hidden" value="<?= isset($tb_pengadaan[0]) ? $tb_pengadaan[0]['kd_pengadaan'] : "UNKNOWN" ?>" class="form-control" name="kode_pengadaan">

                    <div class="form-group">
                      <label for="tanggal_masuk">Tanggal Masuk</label>
                      <input id="tanggal_masuk" type="date" value="<?= isset($tb_pengadaan[0]) ? $tb_pengadaan[0]['tanggal_masuk'] : "UNKNOWN" ?>" class="form-control" name="tanggal_masuk">
                    </div>

                    <div class="form-group">
                      <label>Supplier</label>
                      <select class="form-control" name="kode_supplier">
                        <?php
                        foreach ($tb_supplier as $supplier) :
                        ?>
                          <option <?= ($supplier['kd_supplier'] == $tb_pengadaan[0]['kd_supplier']) ? 'selected' : '' ?> value="<?= $supplier['kd_supplier'] ?>"><?= $supplier['nama_supplier'] ?></option>
                        <?php
                        endforeach;
                        ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <button type="submit" name="submit" class="btn btn-primary">Update</button>
                    </div>

                  <?php
                  else :
                  ?>
                    <h1>Pengadaan Tidak ditemukan (unknown)</h1>
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