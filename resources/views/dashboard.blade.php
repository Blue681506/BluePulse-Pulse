<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - BluePulse</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            min-height: 100vh;
            color: #063344;
            background:
                radial-gradient(circle at 15% 20%, rgba(255,255,255,0.35), transparent 25%),
                radial-gradient(circle at 80% 30%, rgba(0,255,255,0.25), transparent 25%),
                linear-gradient(135deg, #003b5c, #0077b6, #00b4d8, #48cae4);
        }

        .ocean {
            min-height: 100vh;
            padding: 40px;
            background-image:
                radial-gradient(circle, rgba(255,255,255,0.25) 2px, transparent 3px),
                radial-gradient(circle, rgba(255,255,255,0.13) 1px, transparent 2px);
            background-size: 90px 90px, 55px 55px;
        }

        .header {
            background: rgba(255,255,255,0.22);
            border: 1px solid rgba(255,255,255,0.4);
            backdrop-filter: blur(12px);
            border-radius: 30px;
            padding: 35px;
            margin-bottom: 30px;
            color: white;
            box-shadow: 0 20px 50px rgba(0,0,0,0.2);
        }

        .header h1 {
            margin: 0;
            font-size: 42px;
            font-weight: 900;
        }

        .header p {
            color: #e0fbfc;
            margin-top: 10px;
        }

        .menu {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 22px;
        }

        .card {
            text-decoration: none;
            color: #063344;
            background: rgba(255,255,255,0.94);
            border-radius: 28px;
            padding: 28px;
            min-height: 220px;
            box-shadow: 0 18px 45px rgba(0,0,0,0.22);
            transition: 0.25s;
            position: relative;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-8px);
            background: white;
        }

        .card::after {
            content: "";
            position: absolute;
            width: 140px;
            height: 140px;
            right: -50px;
            bottom: -50px;
            background: rgba(0,180,216,0.18);
            border-radius: 50%;
        }

        .emoji {
            font-size: 52px;
            margin-bottom: 18px;
        }

        .card h2 {
            margin: 0;
            font-size: 23px;
            color: #005f73;
        }

        .card p {
            color: #334155;
            line-height: 1.6;
        }

        .logout-box {
            margin-top: 30px;
            background: rgba(255,255,255,0.94);
            border-radius: 25px;
            padding: 20px;
            box-shadow: 0 18px 45px rgba(0,0,0,0.22);
        }

        .logout-btn {
            border: none;
            cursor: pointer;
            border-radius: 14px;
            padding: 12px 18px;
            font-weight: bold;
            color: #063344;
            background: #caf0f8;
        }

        .logout-btn:hover {
            background: #ade8f4;
        }

        @media (max-width: 950px) {
            .menu {
                grid-template-columns: 1fr;
            }

            .header h1 {
                font-size: 32px;
            }

            .ocean {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

<div class="ocean">

    <div class="header">
        <h1>🌊 Selamat Datang di BluePulse</h1>
        <p>
            Jelajahi ensiklopedia laut, kerjakan quiz, lihat leaderboard, dan buat laporan edukatif.
        </p>
    </div>

    <div class="menu">

        <a href="/encyclopedia" class="card">
            <div class="emoji">🐠</div>
            <h2>Marine Encyclopedia</h2>
            <p>Pelajari spesies laut Indonesia lengkap dengan habitat dan deskripsi.</p>
        </a>

        <a href="/quiz" class="card">
            <div class="emoji">🧠</div>
            <h2>Eco Quiz</h2>
            <p>Kerjakan quiz interaktif tentang ekosistem laut dan konservasi.</p>
        </a>

        <a href="/leaderboard" class="card">
            <div class="emoji">🏆</div>
            <h2>Leaderboard</h2>
            <p>Lihat ranking skor pelajar dari hasil pengerjaan quiz.</p>
        </a>

        <a href="/reports" class="card">
            <div class="emoji">📋</div>
            <h2>Laporan Laut</h2>
            <p>Buat dan lihat laporan pencemaran atau kondisi laut di sekitar.</p>
        </a>

    </div>

    <div class="logout-box">
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button class="logout-btn">
                Logout
            </button>
        </form>
    </div>

</div>

</body>
</html>