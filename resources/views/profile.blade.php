<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Mahasiswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            background-color: #fff3cd; /* Warna kuning muda */
            color: #856404; /* Warna teks kuning tua */
            font-family: 'Poppins', sans-serif;
        }

        .container {
            margin-top: 50px;
            text-align: center;
            max-width: 600px;
        }

        .profile-header {
            margin-bottom: 30px;
            animation: fadeInDown 1s;
        }

        .profile-icon {
            font-size: 150px;
            color: #ffc107; /* Warna kuning */
            animation: bounceIn 1.2s;
        }

        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes bounceIn {
            from { opacity: 0; transform: scale(0.5); }
            to { opacity: 1; transform: scale(1); }
        }

        .table-container {
            background-color: #ffffff; /* Warna putih untuk kontainer tabel */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 15px;
            transition: transform 0.3s ease;
        }

        .table-container:hover {
            transform: scale(1.02);
        }

        .table td {
            vertical-align: middle;
        }

        .table td:first-child {
            text-align: center;
            font-weight: bold;
            color: #ffc107; /* Warna kuning untuk label tabel */
        }

        .table input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
            background-color: #f8f9fa;
            transition: background-color 0.3s;
        }

        .table input[type="text"]:focus {
            background-color: #e9ecef; /* Warna abu-abu saat fokus */
        }

        .footer {
            margin-top: 30px;
            font-size: 0.9rem;
            color: #6c757d; /* Warna teks footer */
        }

    </style>
</head>
<body>

    <div class="container">
        <div class="profile-header">
            <i class="bi bi-person-circle profile-icon"></i>
            <h1>Profil Mahasiswa</h1>
        </div>

        <div class="table-container">
            <table class="table">
                <tr> 
                    <td>Nama</td> 
                    <td><input type="text" value="<?= $nama ?>"></td> 
                </tr> 
                <tr> 
                    <td>Kelas</td> 
                    <td><input type="text" value="<?= $nama_kelas ?? 'Kelas tidak ditemukan' ?>"></td> 
                </tr> 
                <tr> 
                    <td>NPM</td> 
                    <td><input type="text" value="<?= $npm ?>"></td> 
                </tr> 
            </table>
        </div>

        <div class="footer">
            <p>© 2024 Ilmu Komputer Universitas Lampung.</p>
        </div>
    </div>

</body>
</html>
