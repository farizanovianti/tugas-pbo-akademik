<?php
include('crudmp.php');

if(isset($_GET['kodemapel'])) {
    $kodemapel = $_GET['kodemapel'];

    $hasil = hapusMapel($kodemapel);

    if($hasil > 0) {
        header("Location: bacamapel.php");
        exit();
    } else{
        header("location:gagaltambah.php");
    }
}
?>
