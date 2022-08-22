<?php 
	session_start();
    require_once('../kelola/koneksi.php');
    
    $user = $_POST['username'];
    $password = $_POST['pass'];
    $nama = $_POST['nama'];
    $level = $_POST['level'];
	
	$sql = "INSERT INTO tb_pengguna (sapaan, namalengkap, password, level) VALUES ('".$user."', '".$nama."', '".$password."', '".$level."')";
	$a = $koneksi->query($sql);
		if($a == true) {
			header('location: login.php');
		}else{
			echo "erorr";
		}
 ?>