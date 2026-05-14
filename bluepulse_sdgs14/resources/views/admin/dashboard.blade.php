<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BluePulse Admin Dashboard</title>

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
                radial-gradient(circle at 20% 20%, rgba(255,255,255,0.35), transparent 25%),
                radial-gradient(circle at 80% 30%, rgba(0,255,255,0.25), transparent 25%),
                linear-gradient(135deg, #003b5c, #0077b6, #00b4d8, #48cae4);
            overflow-x: hidden;
        }

        .ocean {
            min-height: 100vh;
            padding: 40px;
            background-image:
                radial-gradient(circle, rgba(255,255,255,0.25) 2px, transparent 3px),
                radial-gradient(circle, rgba(255,255,255,0.15) 1px, transparent 2px);
            background-size: 90px 90px, 55px 55px;
        }

        .header {
            background: rgba(255, 255, 255, 0.22);
            border: 1px solid rgba(255, 255, 255, 0.4);
            backdrop-filter: blur(12px);
            border-radius: 28px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.2);
            color: white;
        }

        .header h1 {
            margin: 0;
            font-size: 42px;
            font-weight: 900;
        }

        .header p {
            margin-top: 10px;
            font-size: 17px;
            color: #e0fbfc;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 35px;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 24px;
            padding: 25px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.18);
            border-bottom: 6px solid #00b4d8;
        }

        .stat-card h2 {
            margin: 0;
            font-size: 18px;
            color: #025464;
        }

        .stat-card p {
            margin: 15px 0 0;
            font-size: 45px;
            font-weight: 900;
            color: #0077b6;
        }

        .menu {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 22px;
        }

        .menu-card {
            text-decoration: none;
            color: #063344;
            background: rgba(255, 255, 255, 0.92);
            border-radius: 26px;
            padding: 28px;
            min-height: 210px;
            box-shadow: 0 18px 45px rgba(0,0,0,0.22);
            transition: 0.25s;
            border: 2px solid rgba(255,255,255,0.7);
            position: relative;
            overflow: hidden;
        }

        .menu-card:hover {
            transform: translateY(-8px);
            background: #ffffff;
        }

        .menu-card::after {
            content: "";
            position: absolute;
            width: 130px;
            height: 130px;
            right: -45px;
            bottom: -45px;
            background: rgba(0, 180, 216, 0.18);
            border-radius: 50%;
        }

        .emoji {
            font-size: 52px;
            margin-bottom: 18px;
        }

        .menu-card h2 {
            margin: 0;
            font-size: 22px;
            color: #005f73;
        }

        .menu-card p {
            font-size: 15px;
            line-height: 1.6;
            color: #334155;
        }

        .bubble {
            position: fixed;
            bottom: -100px;
            width: 25px;
            height: 25px;
            border-radius: 50%;
            background: rgba(255,255,255,0.35);
            animation: rise 9s infinite ease-in;
        }

        .bubble:nth-child(1) { left: 10%; animation-delay: 0s; }
        .bubble:nth-child(2) { left: 30%; animation-delay: 2s; width: 18px; height: 18px; }
        .bubble:nth-child(3) { left: 55%; animation-delay: 4s; width: 35px; height: 35px; }
        .bubble:nth-child(4) { left: 75%; animation-delay: 1s; width: 20px; height: 20px; }
        .bubble:nth-child(5) { left: 90%; animation-delay: 3s; width: 28px; height: 28px; }

        @keyframes rise {
            0% {
                bottom: -100px;
                opacity: 0;
            }
            30% {
                opacity: 1;
            }
            100% {
                bottom: 110%;
                opacity: 0;
            }
        }

        @media (max-width: 900px) {
            .stats,
            .menu {
                grid-template-columns: 1fr;
            }

            .header h1 {
                font-size: 30px;
            }
        }
    </style>
</head>

<body>

<div class="bubble"></div>
<div class="bubble"></div>
<div class="bubble"></div>
<div class="bubble"></div>
<div class="bubble"></div>

<div class="ocean">

    <div class="header">
        <h1>🌊 BluePulse Admin Dashboard</h1>
        <p>Panel pengelolaan edukasi laut, ensiklopedia spesies, quiz, laporan, dan leaderboard.</p>
    </div>

    <div class="stats">

        <div class="stat-card">
            <h2>Total Laporan</h2>
            <p>{{ $totalReports }}</p>
        </div>

        <div class="stat-card">
            <h2>Pending</h2>
            <p>{{ $pendingReports }}</p>
        </div>

        <div class="stat-card">
            <h2>Process</h2>
            <p>{{ $processReports }}</p>
        </div>

        <div class="stat-card">
            <h2>Done</h2>
            <p>{{ $doneReports }}</p>
        </div>

    </div>

    <div class="menu">

        <a href="/admin/reports" class="menu-card">
            <div class="emoji">📋</div>
            <h2>Kelola Laporan</h2>
            <p>Lihat laporan, update status, dan hapus data laporan pencemaran laut.</p>
        </a>

        <a href="/admin/species" class="menu-card">
            <div class="emoji">🐠</div>
            <h2>Kelola Spesies</h2>
            <p>Tambah data spesies laut untuk Marine Encyclopedia BluePulse.</p>
        </a>

        <a href="/admin/quiz" class="menu-card">
            <div class="emoji">🧠</div>
            <h2>Kelola Quiz</h2>
            <p>Buat quiz interaktif tentang ekosistem laut dan konservasi.</p>
        </a>

        <a href="/leaderboard" class="menu-card">
            <div class="emoji">🏆</div>
            <h2>Leaderboard</h2>
            <p>Lihat ranking skor pelajar dari hasil pengerjaan quiz.</p>
        </a>

    </div>

</div>

</body>
</html>