<?php

//Koneksi ke Database
$conn = mysqli_connect("localhost", "root", "", "uas");

//function
function tampilData($data)
{
  global $conn;
  $query = "SELECT * FROM $data";
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function detailData($tabel, $primary, $parameter)
{
  global $conn;
  $query = "SELECT * FROM $tabel WHERE $primary='$parameter'";
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function detailDataRelationship($tabel, $primary, $parameter, $relationshipTabel, $relationshipPrimary, $relationshipParameter)
{
  global $conn;
  $query = "SELECT * FROM $tabel,  $relationshipTabel WHERE $relationshipPrimary = $relationshipParameter AND  $primary='$parameter'";
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}


function tambah($data, $tabel)
{
  global $conn;

  if ($tabel == 'tb_barang') {
    // bagian kiri sesuaikan tabel dan sebelah kanan sesuaikan name form tambah
    $nama_barang = $data["nama_barang"];
    $merk_barang = $data["merk_barang"];
    $jenis_barang = $data["jenis_barang"];
    $satuan_barang = $data["satuan_barang"];
    $harga_satuan = $data["harga_satuan"];
    $stok_barang = $data["stok_barang"];;

    $query = "INSERT INTO $tabel VALUES ('', '$nama_barang', '$merk_barang', '$jenis_barang', '$satuan_barang', '$harga_satuan', '$stok_barang')";
    return mysqli_query($conn, $query);
  } else if ($tabel === "tb_jenis") {
    $nama_jenis = $data["nama_jenis"];

    $query = "INSERT INTO $tabel VALUES ('', '$nama_jenis')";
    return mysqli_query($conn, $query);
  } else if ($tabel === "tb_supplier") {
    $nama_supplier = $data["nama_supplier"];
    $alamat_supplier = $data["alamat_supplier"];
    $nomor_telephone = $data["nomor_telephone"];

    $query = "INSERT INTO $tabel VALUES ('', '$nama_supplier', '$alamat_supplier', '$nomor_telephone')";
    return mysqli_query($conn, $query);
  } elseif ($tabel === "tb_pengadaan_header") {
    $kode_supplier = $data["kode_supplier"];
    $tanggal_masuk = $data["tanggal_masuk"];

    $query = "INSERT INTO $tabel VALUES ('', '$kode_supplier', '$tanggal_masuk')";
    return mysqli_query($conn, $query);
  } elseif ($tabel === "tb_pengadaan_detail") {
    $kode_pengadaan = $data["kode_pengadaan"];
    $kode_barang = $data["kode_barang"];
    $stok_masuk = $data["stok_masuk"];
    $harga_masuk = $data["harga_masuk"];

    $query = "INSERT INTO $tabel VALUES ('$kode_pengadaan', '$kode_barang', '$stok_masuk', '$harga_masuk')";
    return mysqli_query($conn, $query);
  }
}

/* 
  Function untuk mengubah data pada table master(mahasiswa dan buku )
*/
function ubah($data, $table)
{
  global $conn;

  // Condition
  if ($table == "tb_barang") {
    $kode_barang = $data["kode_barang"];
    $nama_barang = $data["nama_barang"];
    $merk_barang = $data["merk_barang"];
    $jenis_barang = $data["jenis_barang"];
    $satuan_barang = $data["satuan_barang"];
    $harga_satuan = $data["harga_satuan"];
    $stok_barang = $data["stok_barang"];

    $query = "UPDATE $table SET nama_barang='$nama_barang',
                merk_barang='$merk_barang',
                kd_jenis='$jenis_barang',
                satuan_barang='$satuan_barang',
                harga_satuan='$harga_satuan',
                stok='$stok_barang'
              WHERE kd_barang='$kode_barang'";

    return mysqli_query($conn, $query);
  } else if ($table == "tb_jenis") {
    $nama_jenis = $data["nama_jenis"];
    $kode_jenis = $data["kode_jenis"];

    $query = "UPDATE $table SET nama_jenis='$nama_jenis'
              WHERE kd_jenis='$kode_jenis'";

    return mysqli_query($conn, $query);
  } else if ($table == "tb_supplier") {
    $kode_supplier = $data["kode_supplier"];
    $nama_supplier = $data["nama_supplier"];
    $alamat_supplier = $data["alamat_supplier"];
    $nomor_telephone = $data["nomor_telephone"];

    $query = "UPDATE $table SET nama_supplier='$nama_supplier',
              alamat = '$alamat_supplier',
              no_telephone = '$nomor_telephone'
              WHERE kd_supplier='$kode_supplier'";

    return mysqli_query($conn, $query);
  } else if ($table === "tb_pengadaan_header") {
    $kode_pengadaan = $data["kode_pengadaan"];
    $kode_supplier = $data["kode_supplier"];
    $tanggal_masuk = $data["tanggal_masuk"];

    $query = "UPDATE $table SET kd_supplier='$kode_supplier',
    tanggal_masuk = '$tanggal_masuk'
    WHERE kd_pengadaan='$kode_pengadaan'";

    return mysqli_query($conn, $query);

  } else if ($table === "tb_pengadaan_detail") {
    $kode_pengadaan = $data["kode_pengadaan"];
    $kode_barang = $data["kode_barang"];
    $stok_masuk = $data["stok_masuk"];
    $harga_masuk = $data["harga_masuk"];

    $query = "UPDATE $table SET kd_barang='$kode_barang',
    harga_masuk = '$harga_masuk',
    stok_masuk = '$stok_masuk'
    WHERE kd_pengadaan='$kode_pengadaan' AND kd_barang = '$kode_barang'";

    return mysqli_query($conn, $query);

  }
}

function hapus($table, $primary, $data)
{
  global $conn;
  $query = "DELETE FROM $table WHERE $primary=$data";
  return mysqli_query($conn, $query);
}
