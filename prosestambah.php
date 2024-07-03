<?php
include('crudsiswa.php');
include('koneksiakad.php');
$nis=$_POST['NIS'];
$nama=$_POST['nama'];
$jenkel=$_POST['jenkel'];
$jurusan=$_POST['jurusan'];
$sql = "SELECT * FROM siswa WHERE NIS = $nis";
$run = mysqli_query($koneksi, $sql);
$row = mysqli_num_rows($run);
if($row == 0){
    $hasil = tambahSiswa($nis,$nama,$jenkel,$jurusan);
    if($hasil > 0){
        header("location:bacasiswa2.php");
    }else{
        echo "GAGAL UNTUK TAMBAH DATA!";
        header("location:tambahsiswa.php");
    }
}else{
    echo"NIS sudah digunakan";
}
?>
