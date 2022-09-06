<?php 
include 'koneksi.php';
$nama = $_POST['namawisata'];
$source = $_FILES['foto']['name'];
$date = $_POST['date'];
$type = $_POST['type'];

$tmp = $_FILES['foto']['tmp_name'];
$ekstensi =  array('png','jpg','jpeg','gif','mp4','avi','3gp','mov','mpeg');
$filename = explode(".", $_FILES["foto"]["name"]);;
$ukuran = $_FILES['foto']['size'];
$path = "galeri/" . round(microtime(true)) . '.' . end($filename);
$ext = pathinfo($path, PATHINFO_EXTENSION);

if(!in_array($ext,$ekstensi) ) {
		header("location:upload.php?alert=gagal_ekstensi");
	}else{
	if($ukuran < 52428800){
		move_uploaded_file($tmp, $path);
		mysqli_query($koneksi, "INSERT INTO galeri(id_wisata, source, tanggal, type) VALUES('$nama','$path', '$date', '$type')");
			header("location:kategorikelola.php?alert=berhasil");
	}else{
				header("location:upload.php?alert=gagal_ukuran");
			}
		}
