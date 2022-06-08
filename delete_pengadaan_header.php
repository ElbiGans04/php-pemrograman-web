<?php

include 'header.php';

require 'functions.php'; 

if (hapus("tb_pengadaan_header", "kd_pengadaan", $_GET['kode_pengadaan'])) {
  echo "<script>alert('Data berhasil didelete !!'); window.location = 'tampil_pengadaan_header.php'</script>";
} else {
  echo "<script>alert('Data gagal didelete !!'); window.location = 'tampil_pengadaan_header.php'</script>";
}


?>