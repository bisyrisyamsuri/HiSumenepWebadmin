<?php
require_once('koneksi.php');
require_once('fungsi.php');

$_id = $_POST['idkategori'];

$sql = "DELETE FROM wisata WHERE id=$_id ";

$hasil = delete($sql);

if ($hasil) {
    echo "Data wisata berhasil dihapus . . .";
}

?>