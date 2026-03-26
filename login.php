<!DOCTYPE html>
<?php
session_start();

$username_benar = "admin";
$password_benar = "1234";
$pesan = "";

if (isset($_SESSION["Login"])) {
    header("Location: dashboard.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username == $username_benar && $password == $password_benar) {
        $_SESSION["Login"] = true;
        $_SESSION["username"] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        $pesan = "Username atau password salah";
    }
}
?>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #ffd6e7, #ffeaf4);
            font-family: 'Poppins', sans-serif;
        }
        .kartu {
            background: #fff;
            border-radius: 16px;
            padding: 36px 32px;
            box-shadow: 0 8px 24px rgba(214, 51, 132, 0.15);
            width: 300px;
            text-align: center;
        }
        h2 {
            margin: 0 0 20px;
            color: #d63384;
            font-size: 1.4rem;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px 14px;
            margin-bottom: 12px;
            border: 1px solid #f3c6d8;
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-size: .9rem;
            outline: none;
            box-sizing: border-box;
        }
        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #d63384;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background: #d63384;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-size: .9rem;
            font-weight: 600;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background: #b5286f;
        }
        .pesan-error {
            color: #e53e3e;
            font-size: .85rem;
            margin-bottom: 12px;
        }
    </style>
</head>
<body>
<div class="kartu">
    <h2>Login</h2>

    <?php if ($pesan != ""): ?>
        <p class="pesan-error"><?php echo $pesan; ?></p>
    <?php endif; ?>

    <form method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Masuk">
    </form>
</div>
</body>
</html>
