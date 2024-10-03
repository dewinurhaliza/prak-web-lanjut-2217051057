<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #fff3cd 0%, #ffeeba 100%); 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .container {
            background-color: #ffffff; 
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            max-width: 600px;
            width: 100%;
        }

        h1 {
            text-align: center;
            color: #856404; 
            font-weight: 700;
            margin-bottom: 30px;
        }

        label {
            font-weight: bold;
            color: #333;
        }

        .form-control {
            margin-bottom: 20px;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #ffc107; 
            box-shadow: 0 0 8px rgba(255, 193, 7, 0.3);
        }

        .btn-submit {
            width: 100%;
            padding: 12px;
            background-color: #ffc107; 
            color: #ffffff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-submit:hover {
            background-color: #e0a800; 
            transform: translateY(-3px);
        }

        .btn-submit:active {
            background-color: #c69500; 
            transform: translateY(0);
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #f8f9fa;
            padding: 10px 0;
            text-align: center;
            font-size: 0.9rem;
            color: #6c757d;
            box-shadow: 0 -2px 8px rgba(0, 0, 0, 0.1);
        }

        .footer p {
            margin: 0;
        }

        .footer a {
            color: #007bff;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>

    <div class="container">
        <h1>Biodata Pengguna</h1>
        <form action="{{route('user.store')}}" method="POST">
            @csrf
            @include('form')
        </form>
    </div>

    <div class="footer">
        <p>© 2024 Ilmu Komputer Universitas Lampung. All rights reserved.</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
