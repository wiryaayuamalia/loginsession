<!DOCTYPE html>
<?php
session_start();
$user_benar = "admin";
$password_benar = "1234";
$pesan = "";
// kalau sudah login
if (isset($_SESSION["Login"])) {
    header("Location: dashboard.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    if ($username == $user_benar && $password == $password_benar) {
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
    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --rose:     #e8517a;
            --rose-lt:  #f7a8bf;
            --blush:    #fde8ef;
            --cream:    #fff8f9;
            --ink:      #3a1825;
            --muted:    #9c6a7a;
            --shadow:   rgba(232, 81, 122, 0.18);
        }

        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: var(--cream);
            background-image:
                radial-gradient(ellipse 80% 60% at 20% 10%, #fcd5e2 0%, transparent 60%),
                radial-gradient(ellipse 60% 50% at 80% 90%, #f9c6d5 0%, transparent 55%);
            font-family: 'DM Sans', sans-serif;
        }

        /* ── dekorasi bulatan ── */
        body::before,
        body::after {
            content: '';
            position: fixed;
            border-radius: 50%;
            pointer-events: none;
        }
        body::before {
            width: 340px; height: 340px;
            top: -80px; left: -80px;
            background: radial-gradient(circle, #f7c5d9 0%, transparent 70%);
            opacity: .55;
        }
        body::after {
            width: 260px; height: 260px;
            bottom: -60px; right: -60px;
            background: radial-gradient(circle, #faa8c4 0%, transparent 70%);
            opacity: .45;
        }

        /* ── wrapper ── */
        .wrapper {
            width: 100%;
            max-width: 380px;
            padding: 20px;
            text-align: center;
            animation: slideUp 0.55s cubic-bezier(.22,.88,.36,1) both;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(28px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ── ikon / logo ── */
        .logo {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 56px; height: 56px;
            border-radius: 18px;
            background: linear-gradient(135deg, var(--rose-lt), var(--rose));
            box-shadow: 0 8px 24px var(--shadow);
            margin-bottom: 18px;
        }
        .logo svg {
            width: 28px; height: 28px;
            fill: #fff;
        }

        /* ── judul ── */
        h2 {
            font-family: 'DM Serif Display', serif;
            font-size: 2rem;
            color: var(--ink);
            letter-spacing: .5px;
            margin-bottom: 4px;
        }
        .subtitle {
            font-size: .85rem;
            color: var(--muted);
            margin-bottom: 28px;
        }

        /* ── card ── */
        .card {
            background: #fff;
            border-radius: 24px;
            padding: 36px 32px 32px;
            box-shadow:
                0 2px 0 #fcd5e2,
                0 16px 48px var(--shadow);
        }

        /* ── error ── */
        .error {
            display: flex;
            align-items: center;
            gap: 8px;
            background: #fff0f3;
            border: 1px solid #fac5d0;
            border-radius: 12px;
            padding: 10px 14px;
            color: var(--rose);
            font-size: .84rem;
            font-weight: 500;
            margin-bottom: 18px;
            text-align: left;
        }
        .error svg { flex-shrink: 0; width: 16px; height: 16px; fill: var(--rose); }

        /* ── field group ── */
        .field {
            position: relative;
            margin-bottom: 14px;
        }
        .field-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            width: 18px; height: 18px;
            fill: var(--rose-lt);
            pointer-events: none;
            transition: fill .2s;
        }

        /* ── input ── */
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 13px 16px 13px 42px;
            border-radius: 13px;
            border: 1.5px solid #f0d4dc;
            background: var(--cream);
            font-family: 'DM Sans', sans-serif;
            font-size: .93rem;
            color: var(--ink);
            outline: none;
            transition: border-color .2s, box-shadow .2s;
        }
        input[type="text"]::placeholder,
        input[type="password"]::placeholder {
            color: #c8a0ad;
        }
        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: var(--rose);
            background: #fff;
            box-shadow: 0 0 0 4px rgba(232,81,122,.1);
        }
        input[type="text"]:focus ~ .field-icon,
        input[type="password"]:focus ~ .field-icon {
            fill: var(--rose);
        }

        /* ── tombol ── */
        input[type="submit"] {
            width: 100%;
            padding: 13px;
            margin-top: 6px;
            background: linear-gradient(135deg, #f07499, var(--rose));
            color: #fff;
            border: none;
            border-radius: 13px;
            font-family: 'DM Sans', sans-serif;
            font-size: .95rem;
            font-weight: 600;
            letter-spacing: .4px;
            cursor: pointer;
            transition: transform .18s, box-shadow .18s;
            box-shadow: 0 6px 20px var(--shadow);
        }
        input[type="submit"]:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 28px rgba(232,81,122,.35);
        }
        input[type="submit"]:active {
            transform: translateY(0);
        }
    </style>
</head>
<body>
<div class="wrapper">

    <!-- logo -->
    <div class="logo">
        <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 1C8.676 1 6 3.676 6 7v1H4v15h16V8h-2V7c0-3.324-2.676-6-6-6zm0 2c2.276 0 4 1.724 4 4v1H8V7c0-2.276 1.724-4 4-4zm0 9a2 2 0 1 1 0 4 2 2 0 0 1 0-4z"/>
        </svg>
    </div>

    <h2>Selamat Datang</h2>
    <p class="subtitle">Masuk ke akun kamu untuk melanjutkan</p>

    <!-- ERROR -->
    <?php if ($pesan != ""): ?>
    <div class="error">
        <svg viewBox="0 0 24 24"><path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg>
        <?php echo $pesan; ?>
    </div>
    <?php endif; ?>

    <div class="card">
        <form method="post">
            <table style="width:100%; border:none; background:none; box-shadow:none; padding:0; border-radius:0;">
                <tr>
                    <td>
                        <div class="field">
                            <input type="text" name="username" placeholder="Username" required>
                            <svg class="field-icon" viewBox="0 0 24 24"><path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10 5v2h20v-2c0-3.3-6.7-5-10-5z"/></svg>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="field">
                            <input type="password" name="password" placeholder="Password" required>
                            <svg class="field-icon" viewBox="0 0 24 24"><path d="M12 1C8.676 1 6 3.676 6 7v1H4v15h16V8h-2V7c0-3.324-2.676-6-6-6zm0 2c2.276 0 4 1.724 4 4v1H8V7c0-2.276 1.724-4 4-4zm0 9a2 2 0 1 1 0 4 2 2 0 0 1 0-4z"/></svg>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" value="Login →">
                    </td>
                </tr>
            </table>
        </form>
    </div>

</div>
</body>
</html>
