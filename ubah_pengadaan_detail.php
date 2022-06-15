<?php
include 'header.php';
require 'functions.php';

if (isset($_POST["submit"])) {
  $kode_pengadaan = $_POST["kode_pengadaan"];
  $kode_barang_lama = $_POST["kode_barang_lama"];
  $stok_masuk = $_POST["stok_masuk"];
  $stok_masuk_lama = $_POST["stok_masuk_lama"];
  $harga_masuk = $_POST["harga_masuk"];

  $tb_barang = detailData("tb_barang", "kd_barang", $kode_barang_lama)[0];

  // Query
  $query = "UPDATE tb_pengadaan_detail 
  SET stok_masuk = '$stok_masuk',
   harga_masuk = '$harga_masuk'
   WHERE kd_pengadaan='$kode_pengadaan' AND kd_barang='$kode_barang_lama' ";

  mysqli_begin_transaction($conn);

  $query2 = "UPDATE tb_barang SET stok='".(($tb_barang['stok'] - $stok_masuk_lama) + $stok_masuk)."' WHERE kd_barang = '$kode_barang_lama'";

  // var_dump(mysqli_query($conn, $query));
  if (mysqli_query($conn, $query) && mysqli_query($conn, $query2)) {
    mysqli_commit($conn);
    echo "<script>alert('Data berhasil diubah !!'); window.location = 'detail_pengadaan?kode_pengadaan=".$_GET['kode_pengadaan']."'</script></script>";
  } else {
    mysqli_rollback($conn);
    echo "<script>alert('Data gagal diubah !!'); window.location = 'detail_pengadaan?kode_pengadaan=".$_GET['kode_pengadaan']."'</script></script>";
  }
}

$query = "SELECT * FROM tb_pengadaan_detail WHERE kd_pengadaan='".$_GET['kode_pengadaan']."' AND kd_barang='".$_GET['kode_barang']."' ";
$result = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($result);

?>

<!-- Content Wrapper -->
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">

      <!-- Awal Baris -->

      <div class="row mb-2">
        <div class="col sm-6">
          <h1 class="m-0">HALAMAN Pengadaan Detail</h1>
        </div>
        <div class="col sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index">Home</a></li>
            <li class="breadcrumb-item active">Halaman Pengadaan Detail</li>
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
              <h3 class="card-title">Ubah Data Pengadaan Detail</h3>
            </div>

            <div class="card-body">
              <form action="" method="post">
                <div class="card-body">
                  <?php
                  if (isset($result)) :
                  ?>
                    <input id="kode_pengadaan" type="hidden" value="<?= isset($result) ? $result['kd_pengadaan'] : "UNKNOWN" ?>" class="form-control" name="kode_pengadaan">
                    <input id="kode_barang" type="hidden" value="<?= isset($result) ? $result['kd_barang'] : "UNKNOWN" ?>" class="form-control" name="kode_barang_lama">
                    <input id="stok_masuk_lama" type="hidden" value="<?= isset($result) ? $result['stok_masuk'] : "UNKNOWN" ?>" class="form-control" name="stok_masuk_lama">

                    <div class="form-group">
                      <label for="stok_masuk">Stok Masuk</label>
                      <input id="stok_masuk" type="number" value="<?= isset($result) ? $result['stok_masuk'] : "UNKNOWN" ?>" class="form-control" name="stok_masuk">
                    </div>

                    <div class="form-group">
                      <label for="harga_masuk">Harga Masuk</label>
                      <input id="harga_masuk" type="number" value="<?= isset($result) ? $result['harga_masuk'] : "UNKNOWN" ?>" class="form-control" name="harga_masuk">
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