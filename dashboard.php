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
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --rose:   #e8517a;
            --blush:  #fde8ef;
            --cream:  #fff8f9;
            --ink:    #3a1825;
            --muted:  #9c6a7a;
            --shadow: rgba(232,81,122,.18);
        }

        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0; padding: 0;
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

        body::before, body::after {
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

        /* ── card ── */
        .box {
            background: #fff;
            border-radius: 28px;
            padding: 48px 44px 40px;
            text-align: center;
            box-shadow:
                0 2px 0 #fcd5e2,
                0 20px 56px var(--shadow);
            max-width: 420px;
            width: calc(100% - 40px);
            animation: slideUp .55s cubic-bezier(.22,.88,.36,1) both;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(28px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ── avatar/emoji ── */
        .avatar {
            font-size: 3rem;
            line-height: 1;
            margin-bottom: 20px;
        }

        h2 {
            font-family: 'DM Serif Display', serif;
            font-size: 1.75rem;
            color: var(--ink);
            margin-bottom: 8px;
        }

        p {
            font-size: .9rem;
            color: var(--muted);
            margin-bottom: 32px;
        }

        /* ── badge status ── */
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #fff0f5;
            border: 1px solid #fcc8d8;
            border-radius: 100px;
            padding: 6px 14px;
            font-size: .8rem;
            font-weight: 600;
            color: var(--rose);
            margin-bottom: 32px;
        }
        .dot {
            width: 7px; height: 7px;
            border-radius: 50%;
            background: var(--rose);
            animation: pulse 1.8s ease-in-out infinite;
        }
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: .3; }
        }

        /* ── tombol logout ── */
        a {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 28px;
            background: linear-gradient(135deg, #f07499, var(--rose));
            color: #fff;
            text-decoration: none;
            border-radius: 13px;
            font-size: .92rem;
            font-weight: 600;
            letter-spacing: .3px;
            box-shadow: 0 6px 20px var(--shadow);
            transition: transform .18s, box-shadow .18s;
        }
        a:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 28px rgba(232,81,122,.35);
        }
        a:active { transform: translateY(0); }
        a svg { width: 16px; height: 16px; fill: #fff; }
    </style>
</head>
<body>
<div class="box">
    <div class="avatar">🎉</div>
    <h2>Selamat Datang, <?php echo htmlspecialchars($_SESSION["username"]); ?>!</h2>
    <p>Anda berhasil login ke sistem.</p>

    <div class="badge">
        <span class="dot"></span>
        Sesi Aktif
    </div>

    <br>
    <a href="logout.php">
        <svg viewBox="0 0 24 24"><path d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5-5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z"/></svg>
        Logout
    </a>
</div>
</body>
</html>
