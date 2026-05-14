<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BluePulse - Ocean Education Academy</title>

    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            margin: 0;
            min-height: 100vh;
            color: white;
            background:
                radial-gradient(circle at 15% 20%, rgba(255,255,255,0.35), transparent 25%),
                radial-gradient(circle at 80% 30%, rgba(0,255,255,0.25), transparent 25%),
                linear-gradient(135deg, #001f3f, #005f73, #0077b6, #00b4d8, #48cae4);
        }

        .ocean {
            min-height: 100vh;
            padding: 40px;
            background-image:
                radial-gradient(circle, rgba(255,255,255,0.25) 2px, transparent 3px),
                radial-gradient(circle, rgba(255,255,255,0.13) 1px, transparent 2px);
            background-size: 90px 90px, 55px 55px;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(255,255,255,0.18);
            border: 1px solid rgba(255,255,255,0.35);
            backdrop-filter: blur(12px);
            border-radius: 24px;
            padding: 18px 25px;
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
        }

        .brand {
            font-size: 26px;
            font-weight: 900;
        }

        .nav-links {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn {
            text-decoration: none;
            border: none;
            cursor: pointer;
            border-radius: 14px;
            padding: 12px 18px;
            font-weight: bold;
            color: #063344;
            background: #caf0f8;
            display: inline-block;
            box-shadow: 0 8px 20px rgba(0,0,0,0.18);
        }

        .btn:hover {
            background: #ade8f4;
        }

        .hero {
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            gap: 35px;
            align-items: center;
            margin-top: 60px;
        }

        .hero-card {
            background: rgba(255,255,255,0.18);
            border: 1px solid rgba(255,255,255,0.35);
            backdrop-filter: blur(12px);
            border-radius: 35px;
            padding: 45px;
            box-shadow: 0 20px 55px rgba(0,0,0,0.25);
        }

        .hero h1 {
            margin: 0;
            font-size: 58px;
            line-height: 1.1;
            font-weight: 900;
        }

        .hero p {
            color: #e0fbfc;
            font-size: 18px;
            line-height: 1.8;
            margin: 25px 0;
        }

        .tag {
            display: inline-block;
            background: rgba(255,255,255,0.25);
            border: 1px solid rgba(255,255,255,0.35);
            border-radius: 999px;
            padding: 10px 18px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .ocean-visual {
            background: rgba(255,255,255,0.20);
            border: 1px solid rgba(255,255,255,0.35);
            backdrop-filter: blur(12px);
            border-radius: 35px;
            padding: 35px;
            box-shadow: 0 20px 55px rgba(0,0,0,0.25);
            text-align: center;
        }

        .big-emoji {
            font-size: 130px;
            margin-bottom: 20px;
        }

        .ocean-visual h2 {
            font-size: 28px;
            margin-bottom: 10px;
        }

        .features {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 22px;
            margin-top: 40px;
        }

        .feature-card {
            background: rgba(255,255,255,0.94);
            color: #063344;
            border-radius: 28px;
            padding: 25px;
            box-shadow: 0 18px 45px rgba(0,0,0,0.22);
            transition: 0.25s;
        }

        .feature-card:hover {
            transform: translateY(-8px);
        }

        .feature-card .icon {
            font-size: 48px;
            margin-bottom: 15px;
        }

        .feature-card h3 {
            color: #005f73;
            margin: 0 0 10px;
            font-size: 21px;
        }

        .feature-card p {
            color: #334155;
            line-height: 1.6;
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
            0% { bottom: -100px; opacity: 0; }
            30% { opacity: 1; }
            100% { bottom: 110%; opacity: 0; }
        }

        @media (max-width: 950px) {
            .hero,
            .features {
                grid-template-columns: 1fr;
            }

            .hero h1 {
                font-size: 38px;
            }

            .navbar {
                flex-direction: column;
                gap: 15px;
            }

            .ocean {
                padding: 20px;
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

    <nav class="navbar">
        <div class="brand">
            🌊 BluePulse
        </div>

        <div class="nav-links">
            <a href="/encyclopedia" class="btn">Encyclopedia</a>

            @auth
                <a href="/dashboard" class="btn">Dashboard</a>
                <a href="/quiz" class="btn">Quiz</a>
                <a href="/leaderboard" class="btn">Leaderboard</a>
            @else
                <a href="/login" class="btn">Login</a>
                <a href="/register" class="btn">Register</a>
            @endauth
        </div>
    </nav>

    <section class="hero">

        <div class="hero-card">
            
            <h1>
                Ocean Education Academy
            </h1>

            <p>
                BluePulse adalah platform edukasi laut yang membantu pelajar dan masyarakat
                memahami ekosistem laut, spesies laut Indonesia, serta pentingnya menjaga
                kehidupan bawah air melalui ensiklopedia dan quiz interaktif.
            </p>

            <a href="/encyclopedia" class="btn">
                Jelajahi Laut Sekarang
            </a>
        </div>

        <div class="ocean-visual">
            <div class="big-emoji">
                🐠
            </div>

            <h2>
                Learn. Explore. Protect.
            </h2>

            <p>
                Belajar tentang laut, uji pemahamanmu, dan jadilah bagian dari generasi peduli samudra.
            </p>
        </div>

    </section>

    <section class="features">

        <div class="feature-card">
            <div class="icon">🐋</div>
            <h3>Marine Encyclopedia</h3>
            <p>Pelajari spesies laut lengkap dengan nama latin, habitat, gambar, dan deskripsi.</p>
        </div>

        <div class="feature-card">
            <div class="icon">🧠</div>
            <h3>Eco Quiz</h3>
            <p>Kerjakan quiz edukasi laut untuk menguji pengetahuan tentang konservasi laut.</p>
        </div>

        <div class="feature-card">
            <div class="icon">🏆</div>
            <h3>Leaderboard</h3>
            <p>Lihat ranking skor pelajar berdasarkan hasil quiz yang telah dikerjakan.</p>
        </div>

        <div class="feature-card">
            <div class="icon">🌊</div>
            <h3>SDGs 14</h3>
            <p>Mendukung literasi masyarakat tentang pelestarian ekosistem laut Indonesia.</p>
        </div>

    </section>

</div>

</body>
</html>