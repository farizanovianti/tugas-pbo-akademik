<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Mata Pelajaran</title>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');
    body {
        font-family: 'Montserrat', sans-serif;
        background-color: #FEFED5; 
        padding: 20px;
    }
    h2 {
        color: #8EACCD; 
    }
    a {
        color: #F9F3CC; 
        text-decoration: none;
        padding: 5px 10px;
        background-color: #8EACCD;
        border-radius: 3px;
    }
    a:hover {
        background-color: #D2E0FB;
        color:  #8EACCD; 
    }
    table {
        width: 100%;
        /* border-collapse: collapse; */
        margin-top: 20px;
    }
    th, td {
        padding: 10px;
        text-align: left;
        color: #8EACCD; 
    }
    th {
        background-color: #8EACCD;
        color: #F9F3CC;
    }
    tr:nth-child(even) {
        background-color: #D7E5CA;
    }
    tr:nth-child(odd) {
        background-color: #F9F3CC;
    }
</style>
</head>
<body>
<?php 
include('crudmp.php');
$koneksi = koneksiAkademik();
$var_id = $_GET['kodemapel'];
$sql = "SELECT * FROM matapelajaran WHERE kodemapel='$var_id'";
$result = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($result);
session_start();
    if(!isset($_SESSION['login'])){
        header("location:login.php");
    }
?>  

<h2>Ubah Data Mata Pelajaran</h2>
<form action="prosesubahmapel.php" method="post">
    <input type="hidden" name="kodemapel" value="<?=$data['kodemapel']?>">
    <table>
        <tr>
            <td>Nama Mata Pelajaran:</td>
            <td><input type="text" name="namamapel" value="<?=$data['namamapel']?>"></td>
        </tr>
        <tr>
            <td>Jumlah Jam:</td>
            <td><input type="text" name="jam" value="<?=$data['jam']?>"></td>
        </tr>
        <tr>
            <td></td>
            <td colspan="2"><input type="submit" name="submit" value="Simpan Perubahan"></td>
        </tr>
    </table>
</form>
<br><a href="bacamapel.php">Kembali</a>
</body>
</html>
