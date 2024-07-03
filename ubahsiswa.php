<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Daftar siswa</title>
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
include('crudsiswa.php');
$koneksi = koneksiAkademik();
$var_id = $_GET['NIS'];
$sql = "SELECT * FROM siswa WHERE NIS='$var_id'";
$result = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_array($result);
session_start();
    if(!isset($_SESSION['login'])){
        header("location:login.php");
    }
?>

<h2>Ubah Data Siswa</h2>
<form action="prosesubahsiswa.php" method="post">
    <input type="hidden" name="NIS" value="<?=$data['NIS']?>">
    <table>
        <tr>
            <td>Nama:</td>
            <td><input type="text" name="nama" value="<?=$data['nama']?>"></td>
        </tr>
        <tr>
            <td>Jenis Kelamin:</td>
            <td>
                <input type="radio" name="jenkel" value="L" <?php if($data['jenkel'] == 'L') echo 'checked'; ?>>Laki-laki
                <input type="radio" name="jenkel" value="P" <?php if($data['jenkel'] == 'P') echo 'checked'; ?>>Perempuan
            </td>
        </tr>
        <tr>
            <td>Jurusan:</td>
            <td>
                <input type="radio" name="jurusan" value="RPL" <?php if($data['jurusan'] == 'RPL') echo "checked"; ?>>RPL
                <input type="radio" name="jurusan" value="ULP" <?php if($data['jurusan'] == 'ULP') echo "checked"; ?>>ULP
                <input type="radio" name="jurusan" value="PH" <?php if($data['jurusan'] == 'PH') echo "checked"; ?>>PH
                <input type="radio" name="jurusan" value="TBS" <?php if($data['jurusan'] == 'TBS') echo "checked"; ?>>TBS
                <input type="radio" name="jurusan" value="TBG" <?php if($data['jurusan'] == 'TBG') echo "checked"; ?>>TBG
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="submit" value="Simpan Perubahan"></td>
        </tr>
    </table>
</form>
<br><a href="bacasiswa2.php">Kembali</a>
</body>
</html>
