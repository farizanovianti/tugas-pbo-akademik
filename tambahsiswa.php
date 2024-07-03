<?php include('crudsiswa.php'); ?>
<html>
    <head>
        <title>Tambah Data Siswa</title>
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
    <body><h2>Tambah Data Siswa</h2></body>
    <form method='post' action='prosestambah.php'>
        <table>
            <tr><td>NIS</td><td><input type="text" name="NIS"></td></tr>
            <tr><td>Nama</td><td><input type="text" name="nama"></td></tr>
            <tr>
                <td>Jenis Kelamin</td><td>
                    <input type="radio" name="jenkel" value="L">Laki-laki
                    <input type="radio" name="jenkel" value="P">Perempuan
                </td>
                <tr>
                    <td>Jurusan</td><td>
                    <input type="radio" name="jurusan" value="RPL">RPL
                    <input type="radio" name="jurusan" value="UPW">UPW
                    <input type="radio" name="jurusan" value="PH">PH
                    <input type="radio" name="jurusan" value="TBG">TBG
                    <input type="radio" name="jurusan" value="TBS">TBS
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Tambah"></td>
                </tr>
            </tr>
        </table>
    </form>
    <a href="bacasiswa2.php">Kembali</a>
</html>