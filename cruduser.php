<?php
require_once 'koneksiakad.php';

function bacaUser($sql) {
    $data = array();
    $koneksi = koneksiAkademik(); 
    $hasil = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($hasil) == 0) { 
        mysqli_close($koneksi);
        return null;
    }
    while ($baris = mysqli_fetch_assoc($hasil)) { 
        $data[] = $baris;
    }

    mysqli_close($koneksi);
    return $data;
}

function bacaSemuaUser() {
    $sql = "SELECT * FROM user";
    return bacaUser($sql);
}

function tambahUser($username, $password, $nama){
    $koneksi = koneksiAkademik();
    $sql = "INSERT INTO user (username, password, nama) VALUES ('$username', '$password', '$nama')";
    $hasil = 0;
    if(mysqli_query($koneksi, $sql)) {
        $hasil = 1;
    }
    mysqli_close($koneksi);
    return $hasil;
}

function hapusUser($username) {
    $koneksi = koneksiAkademik(); 
    $sql = "DELETE FROM user WHERE username = '$username'"; 
    if (mysqli_query($koneksi, $sql)) {
        $hasil = mysqli_affected_rows($koneksi); 
    } else {
        die('Error: ' . mysqli_error($koneksi)); 
    }
    mysqli_close($koneksi); 
    return $hasil; 
}

function ubahUser($username, $new_password, $new_nama) {
    $koneksi = koneksiAkademik();
    $sql = "UPDATE user SET password = '$new_password', nama = '$new_nama' WHERE username = '$username'";
    $result = mysqli_query($koneksi, $sql);
    mysqli_close($koneksi);
    return $result;
}

function cariUserDariUsername($username) {
    $koneksi = koneksiAkademik();
    $sql = "SELECT * FROM user WHERE username = '$username'";
    $hasil = mysqli_query($koneksi, $sql);
        
    if(mysqli_num_rows($hasil) > 0) {
        $data = mysqli_fetch_assoc($hasil);   
        mysqli_close($koneksi);
        return $data;
    } else {
        mysqli_close($koneksi);
        return null;
    }
}

function otentikasi($username, $password) {
    $dataUser = cariUserDariUsername($username);
    $passmd5 = md5($password);
        
    if ($dataUser != null && $passmd5 == $dataUser['password']) {
        return true;
    } else {
        return false;
    }
}
?>
