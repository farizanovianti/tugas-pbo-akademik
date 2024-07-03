<?php
require_once 'koneksiakad.php';

function bacaMapel($sql) {
    $data = array();
    $koneksi = koneksiAkademik(); 
    $hasil = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($hasil) == 0) { 
        mysqli_close($koneksi);
        return null;
    }
    $i = 0;
    while ($baris = mysqli_fetch_assoc($hasil)) { 
        $data[$i]['kodemapel'] = $baris['kodemapel'];
        $data[$i]['namamapel'] = $baris['namamapel'];
        $data[$i]['jam'] = $baris['jam'];
        $i++;
    }

    mysqli_close($koneksi);
    return $data;
}

function bacaSemuaMapel() {
    $sql = "SELECT * FROM matapelajaran";
    return bacaMapel($sql);
}

function tambahMapel($kodemapel, $namamapel, $jam){
    $koneksi = koneksiAkademik();
    $sql = "INSERT INTO matapelajaran (kodemapel, namamapel, jam) VALUES ('$kodemapel','$namamapel','$jam')";
    $hasil = 0;
    if(mysqli_query($koneksi,$sql))
    $hasil = 1;
    mysqli_close($koneksi);
    return $hasil;
}

function hapusMapel($kodemapel) {
    $koneksi = koneksiAkademik(); 
    $sql = "DELETE FROM matapelajaran WHERE kodemapel = '$kodemapel'"; 
    if (mysqli_query($koneksi, $sql)) {
        $hasil = mysqli_affected_rows($koneksi); 
    } else {
        die('Error: ' . mysqli_error($koneksi)); 
    }
    mysqli_close($koneksi); 
    return $hasil; 
}

function cariMapelDariKodemapel($kodemapel) {
    $koneksi = koneksiAkademik();
    $sql = "SELECT * FROM matapelajaran WHERE kodemapel = '$kodemapel'";
    return bacaMapel($sql);
}

function ubahMapel($kodemapel, $new_namamapel, $new_jam) {
    $koneksi = koneksiAkademik();
    $sql = "UPDATE matapelajaran SET namamapel = '$new_namamapel', jam = '$new_jam' WHERE kodemapel = '$kodemapel'";
    $result = mysqli_query($koneksi, $sql);
    mysqli_close($koneksi);
    return $result;
}

?>
