<?php
    require_once('koneksi.php');
    $wisata=mysqli_query($koneksi, "SELECT * FROM wisata");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Upload</title>
</head>
<body>
	<div class="container">
		<h2 style="text-align: center;">Tambah Galeri</h2>
		<form action="uploadaksi.php" method="post" enctype="multipart/form-data">
			<div class="form-group">
                <label for="namawisata">Nama Wisata </label>
                <select name="namawisata" id="namawisata">
                <option selected> Pilih Wisata </option>
                <?php 
                while($data=mysqli_fetch_array($wisata)) {
                ?>
                <option value="<?=$data['id']?>"><?=$data['nama']?></option> 
                <?php
                    }
                ?>
                </select>
			</div>
            <div class="form-group">
				<label>Tanggal </label>
                <input type="date" name="date" value="<?php echo date("Y-m-d");?>">
			</div>
            <div class="form-group">
                <label for="type">Type </label>
                    <select class="w3-input w3-border w3-margin-bottom pass" 
                    placeholder="type" id="type"  name="type">
						<option value="video">video</option>
						<option value="foto">foto</option>
				    </select>
			</div>
			<div class="form-group">
				<label>File </label>
				<input type="file" name="foto" required="required">
				<p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg | .gif | .mp4 | .avi | .3gp | .mov | .mpeg</p>
			</div>			
			<input type="submit" name="" value="Simpan" class="btn btn-primary">
		</form>
	</div>
 
</body>
</html>
