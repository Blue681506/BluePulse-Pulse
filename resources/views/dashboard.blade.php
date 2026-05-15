<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - AquaAcademy</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial,sans-serif;
        }

        body{
            min-height:100vh;
            background:
                radial-gradient(circle at top left, rgba(255,255,255,0.2), transparent 25%),
                radial-gradient(circle at bottom right, rgba(255,255,255,0.15), transparent 25%),
                linear-gradient(135deg,#003566,#0077b6,#00b4d8,#48cae4);
            overflow-x:hidden;
            color:white;
        }

        .ocean{
            padding:40px;
            min-height:100vh;
            background-image:
                radial-gradient(circle, rgba(255,255,255,0.18) 2px, transparent 2px);
            background-size:60px 60px;
        }

        .header{
            position:relative;
            background:rgba(255,255,255,0.15);
            border:1px solid rgba(255,255,255,0.25);
            border-radius:30px;
            padding:35px;
            margin-bottom:30px;
            backdrop-filter:blur(12px);
            box-shadow:0 10px 40px rgba(0,0,0,0.2);
        }

        .header h1{
            font-size:55px;
            font-weight:900;
        }

        .header p{
            margin-top:10px;
            color:#dff6ff;
        }

        .logout-form{
            position:absolute;
            top:25px;
            right:25px;
        }

        .logout-btn{
            border:none;
            padding:12px 22px;
            border-radius:14px;
            background:#caf0f8;
            color:#003566;
            font-weight:bold;
            cursor:pointer;
            transition:0.2s;
        }

        .logout-btn:hover{
            transform:translateY(-2px);
            background:white;
        }

        .menu{
            display:grid;
            grid-template-columns:repeat(4,1fr);
            gap:25px;
        }

        .card{
            background:rgba(255,255,255,0.92);
            color:#003566;
            text-decoration:none;
            border-radius:28px;
            padding:28px;
            min-height:220px;
            position:relative;
            overflow:hidden;
            transition:0.25s;
            box-shadow:0 15px 35px rgba(0,0,0,0.2);
        }

        .card:hover{
            transform:translateY(-8px);
            background:white;
        }

        .card::after{
            content:"";
            position:absolute;
            width:140px;
            height:140px;
            background:rgba(0,180,216,0.15);
            border-radius:50%;
            right:-50px;
            bottom:-50px;
        }

        .emoji{
            font-size:52px;
            margin-bottom:18px;
        }

        .card h2{
            margin-bottom:14px;
            color:#005f73;
        }

        .card p{
            line-height:1.6;
            color:#334155;
        }

        @media(max-width:950px){

            .menu{
                grid-template-columns:1fr;
            }

            .header h1{
                font-size:36px;
            }

            .logout-form{
                position:static;
                margin-top:20px;
            }

            .ocean{
                padding:20px;
            }
        }
    </style>
</head>
<body>

<div class="ocean">

    <div class="header">

        <h1>🌊 Selamat Datang di AquaAcademy</h1>

        <p>
            Jelajahi ensiklopedia laut, kerjakan quiz, lihat leaderboard, dan buat laporan edukatif.
        </p>

        <form method="POST"
              action="{{ route('logout') }}"
              class="logout-form">

            @csrf

            <button class="logout-btn">
                Logout
            </button>

        </form>

    </div>

    <div class="menu">

        <a href="/encyclopedia" class="card">

            <div class="emoji">🐠</div>

            <h2>Marine Encyclopedia</h2>

            <p>
                Pelajari spesies laut Indonesia lengkap dengan habitat dan deskripsi.
            </p>

        </a>

        <a href="/quiz" class="card">

            <div class="emoji">🧠</div>

            <h2>Eco Quiz</h2>

            <p>
                Kerjakan quiz interaktif tentang ekosistem laut dan konservasi.
            </p>

        </a>

        <a href="/leaderboard" class="card">

            <div class="emoji">🏆</div>

            <h2>Leaderboard</h2>

            <p>
                Lihat ranking skor pelajar dari hasil pengerjaan quiz.
            </p>

        </a>

        <a href="/reports" class="card">

            <div class="emoji">📋</div>

            <h2>Laporan Laut</h2>

            <p>
                Buat dan lihat laporan pencemaran atau kondisi laut di sekitar.
            </p>

        </a>

    </div>

</div>

</body>
</html>