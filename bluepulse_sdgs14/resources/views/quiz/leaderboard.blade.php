<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard - BluePulse</title>

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
            margin-bottom: 30px;
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
        }

        .nav {
            display: flex;
            justify-content: center;
            gap: 15px;
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

        .success {
            background: rgba(209, 250, 229, 0.95);
            color: #065f46;
            padding: 15px;
            border-radius: 16px;
            margin-bottom: 20px;
            font-weight: bold;
            text-align: center;
        }

        .card {
            background: rgba(255,255,255,0.96);
            border-radius: 30px;
            padding: 25px;
            box-shadow: 0 18px 45px rgba(0,0,0,0.22);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            color: #063344;
        }

        th {
            background: #caf0f8;
            padding: 16px;
            color: #005f73;
            font-size: 16px;
        }

        td {
            padding: 16px;
            border-bottom: 1px solid #dbeafe;
            text-align: center;
            font-size: 16px;
        }

        tr:hover {
            background: #f0fdff;
        }

        .rank {
            font-weight: 900;
            font-size: 22px;
            color: #0077b6;
        }

        .score {
            font-weight: 900;
            font-size: 22px;
            color: #005f73;
        }

        .empty {
            text-align: center;
            padding: 35px;
            color: #475569;
            font-weight: bold;
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

        @media (max-width: 900px) {
            .ocean {
                padding: 20px;
            }

            .header h1 {
                font-size: 32px;
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
        <h1>🏆 BluePulse Leaderboard</h1>
        <p>Peringkat pelajar berdasarkan skor quiz edukasi laut.</p>
    </div>

    <div class="nav">
        <a href="/dashboard" class="btn">Dashboard</a>
        <a href="/quiz" class="btn">Eco Quiz</a>
        <a href="/encyclopedia" class="btn">Marine Encyclopedia</a>
    </div>

    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">

        <table>
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>Nama User</th>
                    <th>Quiz</th>
                    <th>Score</th>
                </tr>
            </thead>

            <tbody>
                @forelse($results as $index => $result)

                <tr>
                    <td class="rank">
                        #{{ $index + 1 }}
                    </td>

                    <td>
                        {{ $result->user->name }}
                    </td>

                    <td>
                        {{ $result->quiz->title }}
                    </td>

                    <td class="score">
                        {{ $result->score }}
                    </td>
                </tr>

                @empty

                <tr>
                    <td colspan="4" class="empty">
                        Belum ada skor quiz.
                    </td>
                </tr>

                @endforelse
            </tbody>
        </table>

    </div>

</div>

</body>
</html>