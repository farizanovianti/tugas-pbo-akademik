<?php
include('crudmp.php');

if (isset($_POST['submit'])) {
    $kodemapel = $_POST['kodemapel'];
    $namamapel = $_POST['namamapel'];
    $jmljam = $_POST['jam'];

    $hasil = ubahMapel($kodemapel, $namamapel, $jmljam);
    if ($hasil) {
        header("Location: bacamapel.php");
        exit();
    } else {
        echo "Gagal UPDATE!!";
    }
}
?>
