<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Laut - BluePulse</title>

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

        .top-actions {
            display: flex;
            gap: 15px;
            margin-bottom: 25px;
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

        .success {
            background: rgba(209,250,229,0.95);
            color: #065f46;
            padding: 15px;
            border-radius: 16px;
            margin-bottom: 20px;
            font-weight: bold;
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
            padding: 15px;
            color: #005f73;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #dbeafe;
            text-align: center;
        }

        tr:hover {
            background: #f0fdff;
        }

        .status {
            font-weight: bold;
            background: #e0f2fe;
            color: #075985;
            padding: 8px 12px;
            border-radius: 999px;
            display: inline-block;
        }

        .empty {
            text-align: center;
            padding: 30px;
            font-weight: bold;
            color: #475569;
        }
    </style>
</head>

<body>

<div class="ocean">

    <div class="header">
        <h1>📋 Laporan Laut</h1>
        <p>Lihat dan kirim laporan kondisi laut atau pencemaran di sekitar lingkunganmu.</p>
    </div>

    <div class="top-actions">
        <a href="/dashboard" class="btn">← Dashboard</a>
        <a href="/reports/create" class="btn">+ Tambah Laporan</a>
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
                    <th>Judul</th>
                    <th>Lokasi</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                @forelse($reports as $report)

                    <tr>
                        <td>{{ $report->title }}</td>
                        <td>{{ $report->location }}</td>
                        <td>
                            <span class="status">
                                {{ $report->status }}
                            </span>
                        </td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="3" class="empty">
                            Belum ada laporan.
                        </td>
                    </tr>

                @endforelse
            </tbody>
        </table>

    </div>

</div>

</body>
</html>