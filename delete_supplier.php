<?php

include 'header.php';

require 'functions.php'; 

if (hapus("tb_supplier", "kd_supplier", $_GET['kode_supplier'])) {
  echo "<script>alert('Data berhasil didelete !!'); window.location = 'tampil_supplier.php'</script>";
} else {
  echo "<script>alert('Data gagal didelete !!'); window.location = 'tampil_supplier.php'</script>";
}


?>