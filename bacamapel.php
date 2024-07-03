<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Mata Pelajaran</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #FEFED5; 
            padding: 20px;
        }
        h2 {
            color: #8EACCD; 
            text-align: center;
        }
        h4 {
            margin-left: 70px;
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
            width: 90%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            padding: 10px;
            text-align: left;
            color: #8EACCD; 
            border: 1px solid #ddd;
        }
        th {
            background-color: #8EACCD;
            color: #F9F3CC;
            text-align: center;
        }
        tr:nth-child(even) {
            background-color: #D7E5CA;
        }
        tr:nth-child(odd) {
            background-color: #F9F3CC;
        }
        .aksi {
            text-align: center;
        }
    </style>
</head>
<body>
    <?php
        session_start();
        if (!isset($_SESSION['login'])) {
            header("location:login.php");
            exit();
        }
        include("crudmp.php");

        echo '<h2>Daftar Mata Pelajaran</h2>';
        echo "<h4>User: " . htmlspecialchars($_SESSION['username']) . "</h4>";

        $sql = "SELECT * FROM matapelajaran";
        $data = bacaMapel($sql);
        if ($data == null) {
            echo "<p>Record tidak ditemukan</p>";
        } else {
            echo '<h4><a href="tambahmapel.php">Tambah Data Mapel</a> | <a href="index.php">Kembali</a></h4>';
            echo '<table>
                    <tr>
                        <th>Kode Mapel</th>
                        <th>Nama Mapel</th>
                        <th>Jumlah Jam</th>
                        <th colspan="2">Aksi</th>
                    </tr>';
            foreach ($data as $mapel) {
                $kodemapel = htmlspecialchars($mapel['kodemapel']);
                $namamapel = htmlspecialchars($mapel['namamapel']);
                $jam = htmlspecialchars($mapel['jam']);
                echo "<tr>
                        <td>$kodemapel</td>
                        <td>$namamapel</td>
                        <td>$jam</td>
                        <td class='aksi'><a href='ubahmapel.php?kodemapel=$kodemapel'>Edit</a></td>
                        <td class='aksi'><a href='proseshapus.php?kodemapel=$kodemapel'>Hapus</a></td>
                      </tr>";
            }
            echo '</table>';
        }
    ?>
</body>
</html>
