<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $quiz->title }} - BluePulse</title>

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

        .quiz-box {
            background: rgba(255,255,255,0.95);
            border-radius: 30px;
            padding: 30px;
            box-shadow: 0 18px 45px rgba(0,0,0,0.22);
        }

        .question-card {
            background: #f0fdff;
            border-left: 8px solid #00b4d8;
            border-radius: 22px;
            padding: 24px;
            margin-bottom: 28px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        }

        .question-card h2 {
            margin-top: 0;
            color: #005f73;
            font-size: 22px;
        }

        .option {
            display: block;
            background: white;
            margin-top: 12px;
            padding: 14px 16px;
            border-radius: 14px;
            border: 2px solid #dbeafe;
            cursor: pointer;
            transition: 0.2s;
        }

        .option:hover {
            background: #caf0f8;
            border-color: #00b4d8;
        }

        .option input {
            margin-right: 10px;
        }

        .btn {
            border: none;
            cursor: pointer;
            text-decoration: none;
            background: #caf0f8;
            color: #063344;
            padding: 14px 22px;
            border-radius: 16px;
            font-weight: bold;
            box-shadow: 0 8px 20px rgba(0,0,0,0.18);
        }

        .btn:hover {
            background: #ade8f4;
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
        <h1>🧠 {{ $quiz->title }}</h1>
        <p>Jawab pertanyaan berikut dan raih skor terbaik di leaderboard.</p>
    </div>

    <form action="{{ route('quiz.submit', $quiz->id) }}"
          method="POST"
          class="quiz-box">

        @csrf

        @forelse($quiz->questions as $question)

            <div class="question-card">

                <h2>
                    {{ $loop->iteration }}. {{ $question->question }}
                </h2>

                <label class="option">
                    <input type="radio"
                           name="question_{{ $question->id }}"
                           value="a"
                           required>
                    A. {{ $question->option_a }}
                </label>

                <label class="option">
                    <input type="radio"
                           name="question_{{ $question->id }}"
                           value="b">
                    B. {{ $question->option_b }}
                </label>

                <label class="option">
                    <input type="radio"
                           name="question_{{ $question->id }}"
                           value="c">
                    C. {{ $question->option_c }}
                </label>

                <label class="option">
                    <input type="radio"
                           name="question_{{ $question->id }}"
                           value="d">
                    D. {{ $question->option_d }}
                </label>

            </div>

        @empty

            <p>Belum ada soal untuk quiz ini.</p>

        @endforelse

        <button class="btn">
            Submit Quiz
        </button>

        <a href="/quiz" class="btn">
            Kembali
        </a>

    </form>

</div>

</body>
</html>