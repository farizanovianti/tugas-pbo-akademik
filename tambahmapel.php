<?php include('crudmp.php'); ?>
<html>
<head>
    <title>Tambah Data Mata Pelajaran</title>
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
    <h2>Tambah Data Mata Pelajaran</h2>
    <form method='post' action='prosestambahmapel.php'>
        <table>
            <tr>
                <td>Kode Mapel</td>
                <td><input type="text" name="kodemapel"></td>
            </tr>
            <tr>
                <td>Nama Mata Pelajaran</td>
                <td><input type="text" name="namamapel"></td>
            </tr>
            <tr>
                <td>Jumlah Jam</td>
                <td><input type="text" name="jam"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tambah"></td>
            </tr>
        </table>
    </form>
    <a href="bacamapel.php">Kembali</a>
</body>
</html>
