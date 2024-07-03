<?php
include('crudmp.php');

$kodemapel = $_POST['kodemapel'];
$namamapel = $_POST['namamapel'];
$jam = $_POST['jam'];

$hasil = tambahMapel($kodemapel, $namamapel, $jam);

if($hasil > 0) {
    header("location:bacamapel.php");
} else {
    header("location:gagaltambahmapel.php");
}
?>
