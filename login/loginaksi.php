<?php
session_start();
require_once('../kelola/koneksi.php');

$user = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE username ='$user' AND password='$password'";

$hasil = mysqli_query($koneksi, $sql);

if(mysqli_num_rows($hasil)==1){
 
	$data = mysqli_fetch_assoc($hasil);
 
	// cek jika user login sebagai admin
	if($data['role']=="1"){
 
		// buat session login dan username
		$_SESSION['username'] = $user;
		$_SESSION['role'] = "1";
		// alihkan ke halaman dashboard admin
		header("location: ../kelola/kategorikelola.php");
 
	// cek jika user login sebagai pegawai
	}else if($data['role']=="2"){
		// buat session login dan username
		$_SESSION['username'] = $user;
		$_SESSION['role'] = "2";
		// alihkan ke halaman dashboard pegawai
		header("location: ../kelola/kategorikelola.php");
 
	// cek jika user login sebagai pengurus
	}else{
 
		// alihkan ke halaman login kembali
		header("location:login.php");
	}	
}else{
	echo("gagal");
}
 
?>