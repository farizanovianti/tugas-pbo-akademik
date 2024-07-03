<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pencarian Siswa</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');
        body {
        font-family: 'Montserrat', sans-serif;
        background-color: #FEFED5; 
        padding: 20px;
        }

        h2 {
            color: #8EACCD; 
            font-weight: bold;
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

        input[type="text"] {
            width: 95px;
            height: 15px;
            padding: 10px;
            /* margin: 10px 0; */
            border: 1px solid #8EACCD;
            border-radius: 5px;
        }

        input[type="submit"] {
            padding: 10px 10px;
            border: none;
            border-radius: 5px;
            background-color: #8EACCD;
            color: #FEFED5;
            font-size: 16px;
            cursor: pointer;
            width: 50px;
            margin-left: 125px;
            /* margin-top: -30px; */
        }

        input[type="submit"]:hover {
            background-color: #D2E0FB;
            color: #8EACCD;
        }

        p {
            color: #8EACCD;
        }
    </style>
</head>
<body>
        <h2>Cari siswa</h2>
        <form method="POST">
            <p>NIS: <br><input type="text" name="NIS"></p>
            <input type="submit" value="Cari" name="submit">
        </form>

        <?php
        include ('crudsiswa.php');
        if (isset($_POST['submit'])) {
            $nis = $_POST['NIS'];
            $data = cariSiswaDariNis($nis);

            if ($data == null) {
                echo "<p>Masukkan NIS yang valid!</p>";
            } else {
                echo "<p>Data siswa dengan NIS: $nis</p>";
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