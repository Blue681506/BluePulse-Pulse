<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Spesies - BluePulse</title>

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
                radial-gradient(circle at 85% 25%, rgba(0,255,255,0.25), transparent 25%),
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
            border-radius: 28px;
            padding: 30px;
            margin-bottom: 30px;
            color: white;
            box-shadow: 0 20px 50px rgba(0,0,0,0.2);
        }

        .header h1 {
            margin: 0;
            font-size: 40px;
            font-weight: 900;
        }

        .header p {
            color: #e0fbfc;
            margin-top: 10px;
        }

        .top-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
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
        }

        .btn:hover {
            background: #ade8f4;
        }

        .btn-danger {
            background: #ffccd5;
            color: #5c1121;
        }

        .btn-danger:hover {
            background: #ffb3c1;
        }

        .success {
            background: rgba(209, 250, 229, 0.95);
            color: #065f46;
            padding: 15px;
            border-radius: 16px;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .card {
            background: rgba(255,255,255,0.95);
            border-radius: 28px;
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
            font-size: 15px;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #dbeafe;
            text-align: center;
        }

        tr:hover {
            background: #f0fdff;
        }

        img {
            width: 110px;
            height: 80px;
            object-fit: cover;
            border-radius: 14px;
            box-shadow: 0 6px 14px rgba(0,0,0,0.2);
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
            .top-actions {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
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
        <h1>🐠 Kelola Spesies Laut</h1>
        <p>Admin dapat menambahkan dan menghapus data spesies untuk Marine Encyclopedia BluePulse.</p>
    </div>

    <div class="top-actions">
        <a href="/admin/dashboard" class="btn">← Dashboard</a>
        <a href="/admin/species/create" class="btn">+ Tambah Spesies</a>
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
                    <th>Nama</th>
                    <th>Nama Latin</th>
                    <th>Habitat</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($species as $item)

                <tr>
                    <td>{{ $item->name }}</td>

                    <td><i>{{ $item->latin_name }}</i></td>

                    <td>{{ $item->habitat }}</td>

                    <td>
                        @if($item->image)
                            <img src="{{ asset('uploads/' . $item->image) }}">
                        @else
                            Tidak ada gambar
                        @endif
                    </td>

                    <td>
                        <form action="{{ route('admin.species.delete', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button onclick="return confirm('Hapus spesies ini?')"
                                    class="btn btn-danger">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>

                @endforeach
            </tbody>
        </table>

    </div>

</div>

</body>
</html>