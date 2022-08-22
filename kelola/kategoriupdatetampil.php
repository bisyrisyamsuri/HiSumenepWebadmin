<?php
require_once('koneksi.php');
require_once ('fungsi.php');

$id = $_POST['idkategori'];


$sql = "SELECT * FROM wisata WHERE id=$id";

$data_kategori_terpilih = query_terpilih($sql);

echo json_encode($data_kategori_terpilih);

?>