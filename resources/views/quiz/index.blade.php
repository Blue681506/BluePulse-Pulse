<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eco Interactive Quiz - BluePulse</title>

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
            text-align: center;
            background: rgba(255,255,255,0.22);
            border: 1px solid rgba(255,255,255,0.4);
            backdrop-filter: blur(12px);
            border-radius: 30px;
            padding: 35px;
            margin-bottom: 35px;
            color: white;
            box-shadow: 0 20px 50px rgba(0,0,0,0.2);
        }

        .header h1 {
            margin: 0;
            font-size: 44px;
            font-weight: 900;
        }

        .header p {
            color: #e0fbfc;
            margin-top: 12px;
            font-size: 17px;
        }

        .nav {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-bottom: 30px;
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
            box-shadow: 0 8px 20px rgba(0,0,0,0.18);
            display: inline-block;
        }

        .btn:hover {
            background: #ade8f4;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .quiz-card {
            background: rgba(255,255,255,0.94);
            border-radius: 28px;
            padding: 28px;
            min-height: 230px;
            box-shadow: 0 18px 45px rgba(0,0,0,0.22);
            border: 2px solid rgba(255,255,255,0.7);
            transition: 0.25s;
            position: relative;
            overflow: hidden;
        }

        .quiz-card:hover {
            transform: translateY(-8px);
            background: #ffffff;
        }

        .quiz-card::after {
            content: "";
            position: absolute;
            width: 140px;
            height: 140px;
            right: -50px;
            bottom: -50px;
            background: rgba(0, 180, 216, 0.18);
            border-radius: 50%;
        }

        .quiz-card h2 {
            margin: 0;
            font-size: 25px;
            color: #005f73;
        }

        .quiz-card p {
            color: #334155;
            line-height: 1.6;
            margin-bottom: 25px;
        }

        .empty {
            background: rgba(255,255,255,0.95);
            padding: 35px;
            border-radius: 28px;
            text-align: center;
            font-weight: bold;
            box-shadow: 0 18px 45px rgba(0,0,0,0.22);
            grid-column: 1 / -1;
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
            .grid {
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

<div class="bubble"></div>
<div class="bubble"></div>
<div class="bubble"></div>
<div class="bubble"></div>
<div class="bubble"></div>

<div class="ocean">

    <div class="header">
        <h1>🧠 Eco Interactive Quiz</h1>
        <p>Uji pengetahuanmu tentang ekosistem laut dan konservasi samudra.</p>
    </div>

    <div class="nav">
        <a href="/dashboard" class="btn">Dashboard</a>
        <a href="/encyclopedia" class="btn">Marine Encyclopedia</a>
        <a href="/leaderboard" class="btn">Leaderboard</a>
    </div>

    <div class="grid">

        @forelse($quizzes as $quiz)

            <div class="quiz-card">
                <h2>{{ $quiz->title }}</h2>

                <p>
                    {{ $quiz->description }}
                </p>

                <a href="{{ route('quiz.show', $quiz->id) }}" class="btn">
                    Kerjakan Quiz
                </a>
            </div>

        @empty

            <div class="empty">
                Belum ada quiz yang tersedia.
            </div>

        @endforelse

    </div>

</div>

</body>
</html>