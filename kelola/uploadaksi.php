<?php 
include 'koneksi.php';
$nama = $_POST['namawisata'];
$source = "galeri/" . $_FILES["foto"]["name"];
$date = $_POST['date'];
$type = $_POST['type'];
 
$dir = "galeri/";
$ekstensi =  array('png','jpg','jpeg','gif','mp4','avi','3gp','mov','mpeg');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
 
if(!in_array($ext,$ekstensi) ) {
	header("?alert=gagal_ekstensi");
}else{
	if($ukuran < 52428800){		
		$xx = $dir.$filename;
		move_uploaded_file($_FILES['foto']['tmp_name'], $dir.$filename);
		mysqli_query($koneksi, "INSERT INTO galeri(id_wisata, source, date, type) VALUES('$nama','$source', '$date', '$type')");
		header("location:kategorikelola.php?alert=berhasil");
	}else{
		header("location:upload.php?alert=gagak_ukuran");
	}
}
