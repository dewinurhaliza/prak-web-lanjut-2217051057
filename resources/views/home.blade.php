<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Aplikasi Pengguna</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f9e79f; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .jumbotron {
            background: linear-gradient(135deg, #85e3b5 0%, #3cb371 100%);
            padding: 20px;
            color: white;
            border-radius: 15px;
            margin-top: 70px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        h1 {
            font-size: 30px;
        }

        .jumbotron p {
            font-size: 1.2rem;
            margin-top: 20px;
        }

        .btn-primary {
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: bold;
            border-radius: 8px;
            background-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-danger {
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: bold;
            border-radius: 8px;
        }

        .footer {
            text-align: center;
            padding: 20px 0;
            background-color: #f1f1f1;
            margin-top: 50px;
            color: #6c757d;
        }

    </style>
</head>
<body>

    <div class="container">
        <div class="jumbotron text-center">
            <h1>Selamat Datang di Sistem Informasi Pendaftaran Mahasiswa</h1>
        </div>

        <div class="mt-5">
            <h2>Daftar Mahasiswa</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>NPM</th>
                        <th>Kelas</th>
                        <th>Aksi</th> <!-- Tambahkan kolom aksi -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->nama }}</td>
                            <td>{{ $user->npm }}</td>
                            <td>{{ $user->kelas->nama_kelas }}</td> 
                            <td>
                                <!-- Tombol Edit -->
                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                
                                <!-- Tombol Hapus -->
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="footer">
        <p>© 2024 Ilmu Komputer Universitas Lampung. All rights reserved.</p>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
