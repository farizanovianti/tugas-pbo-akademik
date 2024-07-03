<?php
include('cruduser.php');
$username=$_POST['username'];
$password=$_POST['password'];
$nama=$_POST['nama'];

$passmd5 = md5($password);

$hasil = tambahUser($username,$passmd5,$nama);
if($hasil > 0)
{
    header("location:bacauser2.php");
}else{
    header("location:gagaltambahuser.php");
}
?>
