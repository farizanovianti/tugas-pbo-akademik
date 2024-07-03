<?php
session_start();
include ('cruduser.php');

$username = $_POST['username'];
$password = $_POST['password'];

if (otentikasi($username, $password)) {
    // Set variable session
    $_SESSION['username'] = $username;
    $dataUser = cariUserDariUsername($username);
    $_SESSION['login'] = true;
    // $_SESSION['namauser'] = $dataUser['nama'];
    header("location:index.php");
} else {
    header("location:login.php?error");
}
?>
