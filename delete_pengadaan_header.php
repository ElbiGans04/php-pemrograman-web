<?php

include 'header.php';

require 'functions.php'; 

$barangId = '';
$kumpulanBarang = detailData("tb_pengadaan_detail", "kd_pengadaan", $_GET['kode_pengadaan']);
$kumpulanKodeBarang = [];
forEach ( $kumpulanBarang as $barang) {
  $kumpulanKodeBarang[] = $barang['kd_barang'];
};

$query = "SELECT * FROM tb_barang WHERE kd_barang IN (".(join(",", $kumpulanKodeBarang)).") ";
$result = mysqli_query($conn, $query);
$resultData = (count($kumpulanKodeBarang) === 0) ? [] : mysqli_fetch_all($result, MYSQLI_ASSOC); // error

mysqli_begin_transaction($conn);
$kondisi = (count($kumpulanKodeBarang) === 0) ? [true] : array_map(function ($val, $val2) {
  global $conn;
  $query2 = "UPDATE tb_barang SET stok ='".($val['stok'] - $val2['stok_masuk'])."' WHERE kd_barang = '".($val['kd_barang'])."'";
  $query3 = "DELETE FROM tb_pengadaan_detail WHERE kd_pengadaan='".$val2['kd_pengadaan']."' && kd_barang='".$val2['kd_barang']."'" ;
  return mysqli_query($conn, $query2) && mysqli_query($conn, $query3);
}, $resultData, $kumpulanBarang);

if (hapus("tb_pengadaan_header", "kd_pengadaan", $_GET['kode_pengadaan']) && (array_search(false, $kondisi) ? false : true)) {
  mysqli_commit($conn);
  echo "<script>alert('Data berhasil didelete !!'); //window.location = 'tampil_pengadaan_header.php'</script>";
} else {
  mysqli_rollback($conn);
  echo "<script>alert('Data gagal didelete !!'); //window.location = 'tampil_pengadaan_header.php'</script>";
}


?>