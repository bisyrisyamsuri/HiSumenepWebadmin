<?php
    require_once('koneksi.php');
    $kategori=mysqli_query($koneksi, "SELECT * FROM kategori");
    $wilayah=mysqli_query($koneksi, "SELECT * FROM wilayah");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="css/styletable.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Kelola Wisata</title>
</head>
<body>
    <div class="wadah">
        <button type="button" onclick="document.getElementById
        ('formtambahkategori').style.display='block'">Tambah Data</button>
        <div id="tampilkategori">
        
        </div>
    </div>  

    <!-- membuat form modal utk input kategori baru -->
    <div id="formtambahkategori" class="w3-modal">
        <div class="w3-modal-content">
            <!--header -->
            <div class="w3-container w3-orange w3-text-sand">
                <span onclick="document.getElementById('formtambahkategori').style.display='none'" 
                class="w3-button w3-display-topright w3-red">
                &times;</span>
                <h4 class="w3-center">Tambah Data Wisata</h4>
                
            </div>
            <!-- form -->
            <div style="font-size:12px;" class="w3-container">
                <form id="formkategori" method="POST">
                    <label for="namawisata">Nama Wisata</label>
                    <input type="text" id="namawisata" name="namawisata"
                    class="w3-input w3-border w3-margin-buttom namawisata" 
                    placeholder = "masukkan nama pemesan">
                    <label for="deskripsi">Deskripsi</label>
                    <input type="text" id="deskripsi" name="deskripsi"
                    class="w3-input w3-border w3-margin-buttom deskripsi" 
                    placeholder = "masukkan deskripsi">
                    <label for="longitude">Longitude</label>
                    <input type="text" id="longitude" name="longitude"
                    class="w3-input w3-border w3-margin-buttom longitude" 
                    placeholder = "masukkan longitude">
                    <label for="latitude">Latitude</label>
                    <input type="text" id="latitude" name="latitude"
                    class="w3-input w3-border w3-margin-buttom latitude" 
                    placeholder = "masukkan latitude">
                    <label for="kategori">Kategori</label>
                    <br><select name="kategori" id="kategori">
                    <option selected> Pilih </option>
                    <?php 
                    while($data=mysqli_fetch_array($kategori)) {
                    ?>
                    <option value="<?=$data['id']?>"><?=$data['kategori']?></option> 
                    <?php
                        }
                    ?>
                    </select></br>
                    <label for="harga">Harga</label>
                    <input type="text" id="harga" name="harga"
                    class="w3-input w3-border w3-margin-buttom harga" 
                    placeholder = "masukkan harga">
                    <label for="status">Status</label>
                    <select class="w3-input w3-border w3-margin-bottom pass" 
                    placeholder="status" id="status"  name="status">
						<option value="Y">Y</option>
						<option value="N">N</option>
				    </select>
                    <label for="wilayah">Wilayah</label>
                    <br><select name="wilayah" id="wilayah">
                    <option selected> Pilih </option>
                    <?php 
                    while($data=mysqli_fetch_array($wilayah)) {
                    ?>
                    <option value="<?=$data['id']?>"><?=$data['nama']?></option> 
                    <?php
                        }
                    ?>
                    </select></br>
                    <label for="rekomendasi">Rekomendasi</label>
                    <select class="w3-input w3-border w3-margin-bottom pass" 
                    placeholder="rekomendasi" id="rekomendasi"  name="rekomendasi">
						<option value="Y">Y</option>
						<option value="N">N</option>
				    </select>
                    <label for="popular">Popular</label>
                    <input type="text" id="popular" name="popular"
                    class="w3-input w3-border w3-margin-buttom popular" 
                    placeholder = "masukkan nilai popular">
                </form>
            </div>
            <!-- button -->
            <div style="font-size:12px;" class="w3-container w3-border-top w3-light-gray w3-padding">
                <span class="w3-right">
                    <button type="button" id="simpan" class="w3-button w3-green">Tambah</button>
                    <button type="button" id="batal" class="w3-button w3-red">Batal</button>
                    </span>
            </div>
        </div>
    </div>
    <div class = "wadah w3-margin-right">
    <a href="../login/logout.php" style="margin-top:23px;" class="w3-text-red w3-right">Logout</a>
    </div>

    <script>
        //menampilkan table kategori
        $(document).ready(function() {
            //tampil tabel kategori
            $('#tampilkategori').load('kategoritampil.php');

            //menyimpan kateogori baru
            $('#simpan').click(function(){
                $datakategori = $('#formkategori').serialize();
                $.ajax({
                    type: 'POST',
                    url:  'kategoriinsert.php',
                    data: $datakategori,
                    cache: false,
                    success: function(response){
                        document.getElementById('namawisata').value="";
                        document.getElementById('deskripsi').value="";
                        document.getElementById('longitude').value="";
                        document.getElementById('latitude').value="";
                        document.getElementById('kategori').value="";
                        document.getElementById('harga').value="";
                        document.getElementById('status').value="";
                        document.getElementById('wilayah').value="";
                        document.getElementById('rekomendasi').value="";
                        document.getElementById('popular').value="";
                        $('#tampilkategori').load('kategoritampil.php');
                        window.alert(response);
                    }
                });

            });

            //membatalkan tambah kategori
            $('#batal').click(function(){
                document.getElementById('namawisata').value="";
                document.getElementById('deskripsi').value="";
                document.getElementById('longitude').value="";
                document.getElementById('latitude').value="";
                document.getElementById('kategori').value="";
                document.getElementById('harga').value="";
                document.getElementById('status').value="";
                document.getElementById('wilayah').value="";
                document.getElementById('rekomendasi').value="";
                document.getElementById('popular').value="";
                document.getElementById('formtambahkategori').style.display='none';
            });

            
            });
    </script>  
</body>
</html>