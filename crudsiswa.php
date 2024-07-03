<?php
include_once 'koneksiakad.php';

function bacaSiswa($sql) {
    $data = array();
    $koneksi = koneksiAkademik(); 
    $hasil = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($hasil) == 0) { 
        mysqli_close($koneksi);
        return null;
    }
    $i = 0;
    while ($baris = mysqli_fetch_assoc($hasil)) { 
        $data[$i]['NIS'] = $baris['NIS'];
        $data[$i]['nama'] = $baris['nama'];
        $data[$i]['jenkel'] = $baris['jenkel'];
        $data[$i]['jurusan'] = $baris['jurusan'];
        $i++;
    }

    mysqli_close($koneksi);
    return $data;
}

function bacaSemuaSiswa() {
    $sql = "SELECT * FROM siswa";
    return bacaSiswa($sql);
}

function bacaSiswaPerJurusan($jurusan) {
    $sql = "SELECT * FROM siswa WHERE jurusan = '$jurusan'";
    return bacaSiswa($sql);
}

function tambahSiswa($nis, $nama, $jenkel, $jurusan){
    $koneksi = koneksiAkademik();
    $sql = "insert into siswa values('$nis','$nama','$jenkel','$jurusan')";
    $hasil = 0;
    if(mysqli_query($koneksi,$sql))
    $hasil = 1;
    mysqli_close($koneksi);
    return $hasil;
}

function hapusSiswa($nis) {
    $koneksi = koneksiAkademik(); 
    $sql = "DELETE FROM siswa WHERE NIS = '$nis'"; 
    if (mysqli_query($koneksi, $sql)) {
        $hasil = mysqli_affected_rows($koneksi); 
    } else {
        die('Error: ' . mysqli_error($koneksi)); 
    }
    mysqli_close($koneksi); 
    return $hasil; 
}

function ubahSiswa($nis, $nama, $jenkel, $jurusan) {
    $koneksi = koneksiAkademik();
    $sql = "UPDATE siswa SET nama = '$nama', jenkel = '$jenkel', jurusan = '$jurusan' WHERE NIS = '$nis'";
    $result = mysqli_query($koneksi, $sql);
    mysqli_close($koneksi);
    return $result;
}

function cariSiswaDariNis($nis) {
    $koneksi = koneksiAkademik();
    $sql = "SELECT * FROM siswa WHERE NIS = '$nis'";
    return bacaSiswa($sql);
}

function otentikasi($username, $password) {
    $dataUser = cariUserDariUsername($username);
    $passmd5 = md5($password);
    if ($dataUser && $passmd5 == $dataUser['password']) {
        return true;
    }
    return false;
}
?>
