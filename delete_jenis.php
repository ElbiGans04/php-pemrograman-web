<?php

include 'header.php';

require 'functions.php'; 

if (hapus("tb_jenis", "kd_jenis", $_GET['kode_jenis'])) {
  echo "<script>alert('Data berhasil didelete !!'); window.location = 'tampil_jenis.php'</script>";
} else {
  echo "<script>alert('Data gagal didelete !!'); window.location = 'tampil_jenis.php'</script>";
}


?>