<!DOCTYPE html>
<html lang="en">
<head>
<?php
    session_start();
    if(!isset($_SESSION['login'])){
        header("location:login.php");
    }
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Navigation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
        <ul class="nav-list">
            <div class="nav-items">
                <li class="nav-item card"><a href="bacasiswa2.php">Siswa</a></li>
                <li class="nav-item card"><a href="bacamapel.php">Mapel</a></li>
                <li class="nav-item card"><a href="bacauser2.php">User</a></li>
            </div>
            <li class="nav-item logout"><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
</body>
</html>
