<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar User</title>
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
        include("cruduser.php");

        echo '<h2>Daftar User</h2>';
        echo "<h4>User: " . htmlspecialchars($_SESSION['username']) . "</h4>";

        $sql = "SELECT * FROM user";
        $data = bacaUser($sql);
        if ($data == null) {
            echo "<p>Record tidak ditemukan</p>";
        } else {
            echo '<h4><a href="tambahuser.php">Tambah Data User</a> | <a href="index.php">Kembali</a></h4>';
            echo '<table>
                    <tr>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Nama</th>
                        <th colspan="2">Aksi</th>
                    </tr>';
            foreach ($data as $user) {
                $username = htmlspecialchars($user['username']);
                $password = htmlspecialchars($user['password']);
                $nama = htmlspecialchars($user['nama']);
                echo "<tr>
                        <td>$username</td>
                        <td>$password</td>
                        <td>$nama</td>
                        <td class='aksi'><a href='ubahuser.php?username=$username'>Edit</a></td>
                        <td class='aksi'><a href='proseshapus.php?username=$username'>Hapus</a></td>
                      </tr>";
            }
            echo '</table>';
        }
    ?>
</body>
</html>
