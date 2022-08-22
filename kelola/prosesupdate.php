<?php
require_once('koneksi.php');
require_once ('fungsi.php');

$id = $_POST['idupdate'];
$nama = $_POST['namawisataupdate'];
$deskripsi = $_POST['deskripsiupdate'];
$longitude = $_POST['longitudeupdate'];
$latitude = $_POST['latitudeupdate'];
$kategori = $_POST['kategoriupdate'];
$harga = $_POST['hargaupdate'];
$status = $_POST['statusupdate'];
$wilayah = $_POST['wilayahupdate'];
$rekomendasi = $_POST['rekomendasiupdate'];
$popular = $_POST['popularupdate'];


$sql = "UPDATE wisata SET nama = '$nama', deskripsi = '$deskripsi' , longitud = '$longitude' , latitude = '$latitude' , kategori = '$kategori' , harga = '$harga' , status = '$status' , wilayah = '$wilayah' , rekomendasi = '$rekomendasi' , popular = '$popular' WHERE id=$id";

$hasil = update($sql);

if ($hasil) {
    echo "Data Wisata Berhasil di Update";
}

?>