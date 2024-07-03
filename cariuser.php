<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pencarian User</title>
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
        <h2>Cari User</h2>
        <form method="POST">
            <p>Username: <br><input type="text" name="username"></p>
            <input type="submit" value="Cari" name="submit">
        </form>

        <?php
        include ('cruduser.php');
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $data = cariUserDariUsername($username);

            if ($data == null) {
                echo "<p>Masukkan Username yang valid!</p>";
            } else {
                echo "<p>Data User dengan Username: $username</p>";
                echo"
                <table>
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Nama</th>
                </tr>";
                foreach ($data as $user)
                {
                    $username = $user['username'];
                    $password = $user['password'];
                    $nama = $user['nama'];
                    echo"
                    <tr>
                        <td>$username</td>
                        <td>$password</td>
                        <td>$nama</td>
                    </tr>";
                }
            echo"
            </table>";
        }
    }
    ?>

</body>
</html>