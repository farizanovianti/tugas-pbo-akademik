<?php
include('crudsiswa.php');

if(isset($_GET['NIS'])) {
    $nis = $_GET['NIS'];

    $hasil = hapusSiswa($nis);

    if($hasil > 0) {
        header("Location: bacasiswa2.php");
        exit ();
    } else {
        echo ("Location: gagaltambah.php");
    }
} 
?>
