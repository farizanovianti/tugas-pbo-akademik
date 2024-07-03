<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .error-message {
            color: blue;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-in">
            <form action="proseslogin.php" method="post">
                <h1 style="color: #8EACCD;">Log In</h1>
                <?php
                session_start();
                if (isset($_SESSION['login'])) {
                    header("location:index.php");
                    exit();
                }
                if (array_key_exists('error', $_GET)) {
                    echo "<p class='error-message'>Salah Username dan Password</p>";
                }
                ?>
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Log In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Register with your personal details to use all of site features</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
