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
    <?php
        require_once('koneksi.php');
        require_once('fungsi.php');

        $sql = "SELECT * FROM wisata";

        $data_kategori = query($sql);
    ?>

    <table>
        <tr>
            <th>No.Wisata</th>
            <th>Nama Wisata</th>
            <th>Deskripsi</th>
            <th>Longitude</th>
            <th>Latitude</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Status</th>
            <th>Wilayah</th>
            <th>Rekomendasi</th>
            <th>Popular</th>
            <th>Upload File</th>
            <th>Aksi</th>
        </tr>
        <?php
            $nomor_urut = 1;
            foreach($data_kategori as $item_kategori):      
        ?>
        <tr>
            <td><?php echo $nomor_urut ?></td>
            <td><?php echo $item_kategori['nama']; ?></td>
            <td><?php echo $item_kategori['deskripsi']; ?></td>
            <td><?php echo $item_kategori['longitud']; ?></td>
            <td><?php echo $item_kategori['latitude']; ?></td>
            <td><?php echo $item_kategori['kategori']; ?></td>
            <td><?php echo $item_kategori['harga']; ?></td>
            <td><?php echo $item_kategori['status']; ?></td>
            <td><?php echo $item_kategori['wilayah']; ?></td>
            <td><?php echo $item_kategori['rekomendasi']; ?></td>
            <td><?php echo $item_kategori['popular']; ?></td>
            <td><a href="upload.php" target="_blank">Upload Disini</a></p></td>
            <td>
                <button type="button" id="<?php echo $item_kategori['id'] ?>" 
                class="w3-button w3-green update">Update</button>
                <button type="button" id="<?php echo $item_kategori['id'] ?>" 
                class="w3-button w3-red hapus delete">Delete</button>
            </td>
        </tr>
        <?php
            $nomor_urut++;
            endforeach;
        ?>
    </table>

    <!-- membuat form untuk update kategori -->    
    <div id="formupdatekategori" class="w3-modal">
        <div class="w3-modal-content">
            <!--header -->
            <div class="w3-container w3-orange w3-text-sand">
                <span onclick="document.getElementById('formupdatekategori').style.display='none'"
                class="w3-button w3-display-topright w3-red">
                &times;</span> 
                <h4 class="w3-center">Ubah Data Wisata</h4>
            </div>
            <!-- form -->
            <div style="font-size:12px;" class="w3-container">
                <form id="formkategoriupdate" method="POST">
                    <label for="idupdate">ID</label>
                    <input type="text" id="idupdate" name="idupdate"
                    class="w3-input w3-border w3-margin-buttom idupdate" >
                    <label for="namawisataupdate">Nama Wisata</label>
                    <input type="text" id="namawisataupdate" name="namawisataupdate"
                    class="w3-input w3-border w3-margin-buttom namawisataupdate" 
                    placeholder = "masukkan nama wisata">
                    <label for="deskripsiupdate">Deskripsi</label>
                    <input type="text" id="deskripsiupdate" name="deskripsiupdate"
                    class="w3-input w3-border w3-margin-buttom deskripsiupdate" 
                    placeholder = "masukkan deskripsi">
                    <label for="longitudeupdate">Longitude</label>
                    <input type="text" id="longitudeupdate" name="longitudeupdate"
                    class="w3-input w3-border w3-margin-buttom longitudeupdate" 
                    placeholder = "masukkan longitude">
                    <label for="latitudeupdate">Latitude</label>
                    <input type="text" id="latitudeupdate" name="latitudeupdate"
                    class="w3-input w3-border w3-margin-buttom latitudeupdate" 
                    placeholder = "masukkan latitude">
                    <label for="kategoriupdate">Kategori</label>
                    <br><select name="kategoriupdate" id="kategoriupdate">
                    <option selected> Pilih Kategori </option>
                    <?php 
                    while($data=mysqli_fetch_array($kategori)) {
                    ?>
                    <option value="<?=$data['id']?>"><?=$data['kategori']?></option> 
                    <?php
                        }
                    ?>
                    </select></br>
                    <label for="hargaupdate">Harga</label>
                    <input type="text" id="hargaupdate" name="hargaupdate"
                    class="w3-input w3-border w3-margin-buttom hargaupdate" 
                    placeholder = "masukkan harga">
                    <label for="statusupdate">Status</label>
                    <select class="w3-input w3-border w3-margin-bottom pass" 
                    placeholder="statusupdate" id="statusupdate"  name="statusupdate">
						<option value="Y">Y</option>
						<option value="N">N</option>
				    </select>
                    <label for="wilayahupdate">Wilayah</label>
                    <br><select name="wilayahupdate" id="wilayahupdate">
                    <option selected> Pilih Wilayah </option>
                    <?php 
                    while($data=mysqli_fetch_array($wilayah)) {
                    ?>
                    <option value="<?=$data['id']?>"><?=$data['nama']?></option> 
                    <?php
                        }
                    ?>
                    </select></br>
                    <label for="rekomendasiupdate">Rekomendasi</label>
                    <select class="w3-input w3-border w3-margin-bottom pass" 
                    placeholder="rekomendasiupdate" id="rekomendasiupdate"  name="rekomendasiupdate">
						<option value="Y">Y</option>
						<option value="N">N</option>
				    </select>
                    <label for="popularupdate">Popular</label>
                    <input type="text" id="popularupdate" name="popularupdate"
                    class="w3-input w3-border w3-margin-buttom popularupdate" 
                    placeholder = "masukkan tanggal">
                </form>
            </div>
            <!-- button -->
            <div style="font-size:12px;" class="w3-container w3-border-top w3-light-gray w3-padding">
                <span class="w3-right">
                    <button type="button" id="buttonupdate" class="w3-button w3-green">Ubah</button>
                    <button type="button" id="batalupdate" class="w3-button w3-red">Batal</button>
                    </span>
            </div>
        </div>
    </div>       

    <script>
        $(document).ready(function(){
            //menghapus kategori
            $('.delete').click(function(){
                $dataid = $(this).attr('id');
                var konfirmasi = confirm('Data yang dipilih akan dihapus ?');
                if(konfirmasi){
                    $.ajax({
                        type: 'POST',
                        url: 'kategorihapus.php',
                        data: {idkategori:$dataid},
                        cache: false,
                        success: function(response){
                             window.alert(response);
                             $('#tampilkategori').load('kategoritampil.php');
                        }
                    }); 
                    }
                });
                //menampilkan form update
                $('.update').click(function(){
                  $('#formupdatekategori').show();  
                  var idkategoriupdate = $(this).attr('id');
                  $.ajax({
                    type: 'POST',
                    url: 'kategoriupdatetampil.php',
                    data: {idkategori : idkategoriupdate},
                    dataType: 'JSON',
                    cache: false,
                    success: function(response) {  
                        $('#idupdate').val(response.id);
                        $('#namawisataupdate').val(response.nama);
                        $('#deskripsiupdate').val(response.deskripsi);
                        $('#longitudeupdate').val(response.longitud);
                        $('#latitudeupdate').val(response.latitude);
                        $('#kategorikategoriupdate').val(response.kategori);
                        $('#hargaupdate').val(response.harga);
                        $('#statusupdate').val(response.status);
                        $('#wilayahupdate').val(response.wilayah);
                        $('#rekomendasiupdate').val(response.rekomendasi);
                        $('#popularupdate').val(response.popular);
                    }

                  });
                });

                //proses update
                $('#buttonupdate').click(function(){
                    var datakategoriupdate = $('#formkategoriupdate').serialize();
                    $.ajax({
                        type: 'POST',
                        url:'prosesupdate.php',
                        data: datakategoriupdate,
                        cache: false,
                        success: function(response){
                            $('#tampilkategori').load('kategoritampil.php');
                            window.alert(response);
                        }
                    });
                });

                //menutup form update
                $('#batalupdate').click(function (){
                    $('#formupdatekategori').hide();
                    
                });
        });
    </script>   

</body>
</html>