<?php
    //koneksi DB
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "hisumenep";
    $koneksi = mysqli_connect ($host, $username, $password, $database);
    if(!$koneksi) {
        die("koneksi gagal : " . mysqli_connect_error());
    }
?>