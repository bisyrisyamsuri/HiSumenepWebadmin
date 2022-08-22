<?php
function query($sql){
    global $koneksi;
    $hasil_query = mysqli_query($koneksi,$sql);
    $data_hasil_query = array();
    while ($record_hasil_query = mysqli_fetch_assoc($hasil_query)) {
        $data_hasil_query[] = $record_hasil_query;
    }
    return $data_hasil_query;
}

function insert($sql){
    global $koneksi;
    $hasil_query = mysqli_query($koneksi, $sql);
    return $hasil_query;
}

function delete($sql) {
    global $koneksi;
    $hasil_query = mysqli_query($koneksi, $sql);
    return $hasil_query;
}

function query_terpilih($sql) {
    global $koneksi;
    $hasil_query = mysqli_query($koneksi, $sql);
    $data_hasil_query = array();
    while ($record_hasil_query = mysqli_fetch_assoc($hasil_query)){
        $data_hasil_query['id'] = $record_hasil_query['id'];
        $data_hasil_query['nama'] = $record_hasil_query['nama'];
        $data_hasil_query['deskripsi'] = $record_hasil_query['deskripsi'];
        $data_hasil_query['longitud'] = $record_hasil_query['longitud'];
        $data_hasil_query['latitude'] = $record_hasil_query['latitude'];
        $data_hasil_query['kategori'] = $record_hasil_query['kategori'];
        $data_hasil_query['harga'] = $record_hasil_query['harga'];
        $data_hasil_query['status'] = $record_hasil_query['status'];
        $data_hasil_query['wilayah'] = $record_hasil_query['wilayah'];
        $data_hasil_query['rekomendasi'] = $record_hasil_query['rekomendasi'];
        $data_hasil_query['popular'] = $record_hasil_query['popular'];

    }
    return $data_hasil_query;
}
function update($sql){
    global $koneksi;
    $hasil_query = mysqli_query($koneksi, $sql);
    return $hasil_query;
}

?>