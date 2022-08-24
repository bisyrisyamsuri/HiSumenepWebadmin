<?php 
include 'koneksi.php';
$nama = $_POST['namawisata'];
$source = $_POST['source'];
$tanggal = $_POST['date'];
$type = $_POST['type'];
 
$rand = rand();
$ekstensi =  array('png','jpg','jpeg','gif');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
 
if(!in_array($ext,$ekstensi) ) {
	header("location:index.php?alert=gagal_ekstensi");
}else{
	if($ukuran < 1044070){		
		$xx = $rand.'_'.$filename;
		move_uploaded_file($_FILES['foto']['tmp_name'], 'galeri/'.$rand.'_'.$filename);
		mysqli_query($koneksi, "INSERT INTO galeri(id_wisata, source, date, type) VALUES('$nama','$source','$tanggal','$type')");
		header("location:kategorikelola.php?alert=berhasil");
	}else{
		header("location:upload.php?alert=gagak_ukuran");
	}
}
