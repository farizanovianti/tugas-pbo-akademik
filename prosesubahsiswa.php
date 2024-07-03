<?php
include('crudsiswa.php');   

if(isset($_POST['submit'])){
    $nis = $_POST['NIS'];
    $nama = $_POST['nama'];
    $jenkel = $_POST['jenkel'];
    $jurusan = $_POST['jurusan'];
    $update = ubahSiswa($nis, $nama, $jenkel, $jurusan);
    
    if($update){
        header("Location: bacasiswa2.php");
        exit();
    } else {
        echo "Gagal UPDATE!!";
    }
}
?>
