<?php

include 'header.php';

require 'functions.php'; 

$query = "DELETE FROM tb_pengadaan_detail WHERE kd_pengadaan='".$_GET['kode_pengadaan']."' AND kd_barang = '".$_GET['kode_barang']."'";
$result = mysqli_query($conn, $query);

if ($result) {
  echo "<script>alert('Data berhasil didelete !!'); window.location = 'detail_pengadaan.php?kode_pengadaan=".$_GET['kode_pengadaan']."'</script>";
} else {
  echo "<script>alert('Data gagal didelete !!'); window.location = 'detail_pengadaan.php?kode_pengadaan=".$_GET['kode_pengadaan']."'</script>";
}
