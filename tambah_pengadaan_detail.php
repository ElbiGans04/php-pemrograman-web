<?php

include 'header.php';
require 'functions.php';

if (isset($_POST["submit"])) {
  $barang = detailData("tb_barang", "kd_barang", $_POST['kode_barang'])[0];
  mysqli_begin_transaction($conn);
  $query = "UPDATE tb_barang SET stok='".($barang['stok'] + $_POST['stok_masuk'])."' WHERE kd_barang ='".$_POST['kode_barang']."'";
  if (tambah($_POST, "tb_pengadaan_detail") && mysqli_query($conn, $query)) {
    mysqli_commit($conn);
    echo "<script>alert('Data berhasil ditambahkan !!'); window.location = 'detail_pengadaan.php?kode_pengadaan=".$_GET['kode_pengadaan']."'</script>";
  } else {
    mysqli_rollback($conn);
    echo "<script>alert('Data gagal ditambahkan !!'); window.location = 'detail_pengadaan.php?kode_pengadaan=".$_GET['kode_pengadaan']."'</script>";
  }
}

$query2 = "SELECT kd_barang FROM tb_pengadaan_detail WHERE kd_pengadaan='".$_GET['kode_pengadaan']."'";
$result2 = mysqli_query($conn, $query2);
$rows = [];

while ($row = mysqli_fetch_assoc($result2)) {
  $rows[] = $row['kd_barang'];
};

$rowsText = join(", ", $rows);


$tb_barang = tampilData("tb_barang");
$query3 = (count($rows) == 0) ? "SELECT * FROM tb_barang" : "SELECT * FROM tb_barang WHERE kd_barang NOT IN ($rowsText)";
$result3 = mysqli_query($conn, $query3);
$tb_barang = [];

while ($row3 = mysqli_fetch_assoc($result3)) {
  $tb_barang[] = $row3;
};

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

                  <input type="hidden" name="kode_pengadaan" value="<?= $_GET['kode_pengadaan'];  ?>">
                  <div class="form-group">
                    <label>Barang</label>
                    <select class="form-control" name="kode_barang">
                      <option disabled selected>- Silahkan Pilih Jenis -</option>
                      <?php 
                        foreach ($tb_barang as $jenis) :
                      ?>
                        <option value="<?= $jenis['kd_barang']?>"><?= $jenis['nama_barang']?></option>
                      <?php 
                        endforeach;
                      ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="stok_masuk">Stok Masuk</label>
                    <input type="number" class="form-control" id="stok_masuk" name="stok_masuk"></input>
                  </div>

                  <div class="form-group">
                    <label for="harga_masuk">Harga Masuk</label>
                    <input type="number" class="form-control" id="harga_masuk" name="harga_masuk"></input>
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