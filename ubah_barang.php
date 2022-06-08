<?php
include 'header.php';
require 'functions.php';

$data = detailDataRelationship("tb_barang", "tb_barang.kd_barang", $_GET['kode_barang'], "tb_jenis", "tb_jenis.kd_jenis", "tb_barang.kd_jenis");
$tb_jenis = tampilData("tb_jenis");
if (isset($_POST["submit"])) {
  if (ubah($_POST, "tb_barang")) {
    echo "<script>alert('Data berhasil diubah !!'); window.location = 'tampil_barang.php'</script>";
  } else {
    echo "<script>alert('Data gagal diubah !!'); window.location = 'tampil_barang.php'</script>";
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
          <h1 class="m-0">HALAMAN BARANG</h1>
        </div>
        <div class="col sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Halaman Barang</li>
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
              <h3 class="card-title">Ubah Data Barang</h3>
            </div>

            <div class="card-body">
              <form action="" method="post">
                <div class="card-body">
                  <?php
                  if (isset($data[0])) :
                  ?>
                    <input id="kode_barang" type="hidden" value="<?= isset($data[0]) ? $data[0]['kd_barang'] : "UNKNOWN" ?>" class="form-control" name="kode_barang">

                    <div class="form-group">
                      <label for="nama_barang">Nama Barang</label>
                      <input id="nama_barang" type="text" value="<?= isset($data[0]) ? $data[0]['nama_barang'] : "UNKNOWN" ?>" class="form-control" name="nama_barang">
                    </div>

                    <div class="form-group">
                      <label>Jenis</label>
                      <select class="form-control" name="jenis_barang">
                        <?php
                        foreach ($tb_jenis as $jenis) :
                        ?>
                          <option <?= ($jenis['kd_jenis'] == $data[0]['kd_jenis']) ? 'selected' : '' ?> value="<?= $jenis['kd_jenis'] ?>"><?= $jenis['nama_jenis'] ?></option>
                        <?php
                        endforeach;
                        ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="merk_barang">Merk Barang</label>
                      <input type="text" value="<?= isset($data[0]) ? $data[0]['merk_barang'] : "UNKNOWN" ?>" class="form-control" id="merk_barang" name="merk_barang"></input>
                    </div>

                    <div class="form-group">
                      <label for="satuan_barang">Satuan Barang</label>
                      <input type="text" value="<?= isset($data[0]) ? $data[0]['satuan_barang'] : "UNKNOWN" ?>" class="form-control" id="satuan_barang" name="satuan_barang"></input>
                    </div>

                    <div class="form-group">
                      <label for="harga_satuan">Harga Satuan</label>
                      <input type="number" value="<?= isset($data[0]) ? $data[0]['harga_satuan'] : "UNKNOWN" ?>" class="form-control" id="harga_satuan" name="harga_satuan"></input>
                    </div>

                    <div class="form-group">
                      <label for="stok_barang">Stok Barang</label>
                      <input type="number" value="<?= isset($data[0]) ? $data[0]['stok'] : "UNKNOWN" ?>" class="form-control" id="stok_barang" name="stok_barang"></input>
                    </div>

                    <div class="form-group">
                      <button type="submit" name="submit" class="btn btn-primary">Update</button>
                    </div>

                  <?php
                  else :
                  ?>
                    <h1>Barang Tidak ditemukan (unknown)</h1>
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