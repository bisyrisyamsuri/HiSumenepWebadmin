<?php
    require_once('koneksi.php');
    require_once ('fungsi.php');

$nama = $_POST['namawisata'];
$deskripsi = $_POST['deskripsi'];
$long = $_POST['longitude'];
$lat = $_POST['latitude'];
$kategori = $_POST['kategori'];
$harga = $_POST['harga'];
$status = $_POST['status'];
$wilayah = $_POST['wilayah'];
$rekomendasi = $_POST['rekomendasi'];
$popular = $_POST['popular'];

$sql = "INSERT INTO wisata(nama, deskripsi, longitud, latitude, kategori, harga, status, wilayah, rekomendasi, popular) VALUES ('$nama', '$deskripsi', '$long', '$lat', '$kategori', '$harga', '$status', '$wilayah', '$rekomendasi', '$popular')";

$hasil = insert($sql);

if ($hasil) {
    echo "Data wisata $nama berhasil ditambah . . .";
}

?>