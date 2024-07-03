<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Daftar Siswa</title>
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
<h2>Daftar Siswa</h2>

<form action="bacasiswa3.php" method="POST">
    <label for="jurusan">Pilih Jurusan:</label>
    <select name="jurusan" id="jurusan">
        <option value="RPL">RPL</option>
        <option value="UPW">UPW</option>
        <option value="PH">PH</option>
        <option value="TBS">TBS</option>
        <option value="TBG">TBG</option>
        
    </select>
    <input type="submit" value="OK!">
</form>

<?php
include ('crudsiswa.php');

if(isset($_POST['jurusan'])) {
    $jurusan = $_POST['jurusan'] ?? null;
    $data = bacaSiswaPerJurusan($jurusan);
    if ($data==null){
        echo "record tidak ditemukan";
    } elseif ($data != null) {
        echo"
        <table>
            <tr>
                <th>NIS</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Jurusan</th>
            </tr>";
            foreach ($data as $siswa)
            {
                $nis = $siswa['NIS'];
                $nama = $siswa['nama'];
                $jenkel = $siswa['jenkel'];
                $jurusan = $siswa['jurusan'];
                echo"
                <tr>
                    <td>$nis</td>
                    <td>$nama</td>
                    <td>$jenkel</td>
                    <td>$jurusan</td>
                </tr>";
            }
        echo"
        </table>";
    }
}
?>
<br><br><a href="bacasiswa2.php">Kembali</a>
</body>
</html>