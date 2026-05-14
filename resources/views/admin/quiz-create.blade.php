<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Quiz - BluePulse</title>

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
        }

        .form-card {
            background: rgba(255,255,255,0.96);
            border-radius: 30px;
            padding: 30px;
            box-shadow: 0 18px 45px rgba(0,0,0,0.22);
        }

        label {
            font-weight: bold;
            color: #005f73;
            display: block;
            margin-bottom: 8px;
        }

        input, textarea, select {
            width: 100%;
            padding: 13px;
            border-radius: 14px;
            border: 2px solid #caf0f8;
            margin-bottom: 18px;
            color: #063344;
            background: white;
        }

        textarea {
            min-height: 90px;
        }

        .question-box {
            background: #f0fdff;
            border-left: 8px solid #00b4d8;
            border-radius: 22px;
            padding: 22px;
            margin-bottom: 25px;
        }

        .question-box h3 {
            margin-top: 0;
            color: #005f73;
        }

        .btn {
            text-decoration: none;
            border: none;
            cursor: pointer;
            border-radius: 14px;
            padding: 13px 20px;
            font-weight: bold;
            color: #063344;
            background: #caf0f8;
            display: inline-block;
            box-shadow: 0 8px 20px rgba(0,0,0,0.18);
        }

        .btn:hover {
            background: #ade8f4;
        }
    </style>
</head>

<body>

<div class="ocean">

    <div class="header">
        <h1>🧠 Tambah Eco Quiz</h1>
        <p>Buat quiz edukasi laut lengkap dengan pertanyaan dan jawaban benar.</p>
    </div>

    <form action="{{ route('admin.quiz.store') }}"
          method="POST"
          class="form-card">

        @csrf

        <label>Judul Quiz</label>
        <input type="text" name="title" required>

        <label>Deskripsi</label>
        <textarea name="description"></textarea>

        @for($i = 0; $i < 3; $i++)

            <div class="question-box">
                <h3>Soal {{ $i + 1 }}</h3>

                <label>Pertanyaan</label>
                <input type="text" name="questions[{{ $i }}][question]">

                <label>Option A</label>
                <input type="text" name="questions[{{ $i }}][a]">

                <label>Option B</label>
                <input type="text" name="questions[{{ $i }}][b]">

                <label>Option C</label>
                <input type="text" name="questions[{{ $i }}][c]">

                <label>Option D</label>
                <input type="text" name="questions[{{ $i }}][d]">

                <label>Jawaban Benar</label>
                <select name="questions[{{ $i }}][correct]">
                    <option value="a">A</option>
                    <option value="b">B</option>
                    <option value="c">C</option>
                    <option value="d">D</option>
                </select>
            </div>

        @endfor

        <button class="btn">
            Simpan Quiz
        </button>

        <a href="/admin/quiz" class="btn">
            Kembali
        </a>

    </form>

</div>

</body>
</html>