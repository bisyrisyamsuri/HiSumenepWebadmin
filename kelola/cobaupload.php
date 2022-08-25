<?php
require_once('koneksi.php');


if(isset($_POST['add'])){
	$target_dir = "galeri/";
	$target_file = $target_dir . basename($_FILES["uploadfile"]["name"]);

	move_uploaded_file($_FILES["uploadfile"]["tmp_name"],$target_file);

	// $uuid = Uuid::uuid4()->toString();
	$nama = trim(mysqli_real_escape_string($koneksi, $_POST['namawisata']));
	$source = "galeri/" . $_FILES["uploadfile"]["name"];
	$tanggal = trim(mysqli_real_escape_string($koneksi, $_POST['date']));
	$type = trim(mysqli_real_escape_string($koneksi, $_POST['type']));
	// $no = trim(mysqli_real_escape_string($koneksi, $_POST['no']));

	mysqli_query($koneksi, "INSERT INTO galeri VALUES('$nama', '$source', '$tanggal', '$type')") or die(mysqli_error($koneksi));
	echo "<script>window.location='kategorikelola.php';</script>";
}