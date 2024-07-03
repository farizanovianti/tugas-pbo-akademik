<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Daftar User</title>
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
include('cruduser.php');

if(isset($_GET['username'])) {
    $username = $_GET['username'];

    $data_user = cariUserDariUsername($username);

    if($data_user) {
        $password = $data_user['password'];
        $nama = $data_user['nama'];
    } else {
        echo "Data tidak ditemukan.";
    }
} else {
    echo "Parameter Username tidak ditemukan.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = $_POST['password'];
    $new_nama = $_POST['nama'];

    $passmd5 = $new_password;

    $result = ubahUser($username, $passmd5, $new_nama);

    if($result) {
        header("Location: bacauser2.php");
        exit();
    } else {
        echo "Gagal mengubah data user.";
    }
}
?>

<?php
    session_start();
    if(!isset($_SESSION['login'])){
        header("location:login.php");
    }
?>

<h2>Ubah Data User</h2>
<form method="post">
    <input type="hidden" name="username" value="<?php echo $username; ?>">
    <table>
        <tr>
            <td>Password:</td>
            <td><input type="text" name="password" value="<?php echo $password; ?>"></td>
        </tr>
        <tr>
            <td>Nama:</td>
            <td><input type="text" name="nama" value="<?php echo $nama; ?>"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Simpan Perubahan"></td>
        </tr>
    </table>
</form>
<br><a href="bacauser2.php">Kembali</a>
</body>
</html>