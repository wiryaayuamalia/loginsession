<?php
session_start();

if (!isset($_SESSION["Login"])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
            margin: 0 0 8px;
            color: #d63384;
            font-size: 1.3rem;
        }
        p {
            color: #888;
            font-size: .9rem;
            margin: 0 0 24px;
        }
        a {
            display: inline-block;
            padding: 10px 24px;
            background: #d63384;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-size: .9rem;
            font-weight: 600;
        }
        a:hover {
            background: #b5286f;
        }
    </style>
</head>
<body>
<div class="kartu">
    <h2>Selamat Datang, <?php echo $_SESSION["username"]; ?>! 🎉</h2>
    <p>Anda berhasil login</p>
    <a href="logout.php">Logout</a>
</div>
</body>
</html>