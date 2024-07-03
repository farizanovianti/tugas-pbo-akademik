<?php
include('cruduser.php');

if(isset($_GET['username'])) {
    $username = $_GET['username'];

    $hasil = hapusUser($username);

    if($hasil > 0) {
        header("Location: bacauser2.php");
        exit ();
    } else {
        echo ("Location: gagaltambahuser.php");
    }
} 
?>
