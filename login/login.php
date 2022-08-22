<!DOCTYPE html>
<html lang="en">
<?php
	//
	require_once('../kelola/koneksi.php');
	require_once('../kelola/fungsi.php');
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/icon" href="gambar/logo.png"/>
    <!-- load w3school css -->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="../css/stylelogin.css">
    <!-- load script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <title>Login</title>
</head>
<body>
<div class="w3-container wadah">
    <!-- bagian header -->
    <div class="w3-container w3-blue w3-text-sand w3-border-top w3-border-left
    w3-border-right w3-border-blue">
        <h4 style="font-size:14px; text-align:center">Login</h4>
    </div>
    <!-- bagian form -->
    <div style="font-size:12px;" class="w3-container w3-padding w3-border-right
    w3-border-left w3-border-left w3-border-right w3-border-bottom w3-border-blue-grey">
        <form id="formlogin" method="POST" action="loginaksi.php">
            <div>
                <label for="user">Username</label>
                <input type="text" name="username" id="username" class="w3-input
                w3-border w3-margin-bottom username" placeholder="Username">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="w3-input
                w3-border w3-margin-bottom password" placeholder="Password">
            <!-- bagian tombol -->
            <div style="font-size:12px;" class="w3-container w3-border-blue w3-left-blue w3-padding">
                <input type="submit" value="Login" class="w3-button w3-blue
                w3-text-sand w3-block buttonlogin">
                <span class="w3-right">

                </span>

            </div>
        </form>
    </div>
</div>
</body>
</html>