<?php

include 'header.php';

require 'functions.php'; 

if (hapus("tb_barang", "kd_barang", $_GET['kode_barang'])) {
  echo "<script>alert('Data berhasil didelete !!'); window.location = 'tampil_barang'</script>";
} else {
  echo "<script>alert('Data gagal didelete !!'); window.location = 'tampil_barang'</script>";
}


?>