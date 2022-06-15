<?php

include 'header.php';

require 'functions.php'; 

mysqli_begin_transaction($conn);
$query = "DELETE FROM tb_pengadaan_detail WHERE kd_pengadaan='".$_GET['kode_pengadaan']."' AND kd_barang = '".$_GET['kode_barang']."'";

$query2= "SELECT * FROM tb_pengadaan_detail, tb_barang WHERE tb_pengadaan_detail.kd_pengadaan='".$_GET['kode_pengadaan']."' AND tb_pengadaan_detail.kd_barang = '".$_GET['kode_barang']."' AND tb_barang.kd_barang = tb_pengadaan_detail.kd_barang";
$result2 = mysqli_query($conn, $query2);
$result2Data = mysqli_fetch_assoc($result2);


$query3= "UPDATE tb_barang SET stok ='".($result2Data['stok'] - $result2Data['stok_masuk'])."' WHERE kd_barang = '".$_GET['kode_barang']."'";
$result3 = mysqli_query($conn, $query3);


if (mysqli_query($conn, $query) && $result3) {
  mysqli_commit($conn);
  echo "<script>alert('Data berhasil didelete !!'); window.location = 'detail_pengadaan?kode_pengadaan=".$_GET['kode_pengadaan']."'</script>";
} else {
  mysqli_rollback($conn);
  echo "<script>alert('Data gagal didelete !!'); window.location = 'detail_pengadaan?kode_pengadaan=".$_GET['kode_pengadaan']."'</script>";
}
