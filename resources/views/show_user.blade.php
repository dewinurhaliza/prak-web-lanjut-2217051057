@extends('layouts.app')
@section('content')
<style>
    .card {
        background-color: #ffffff;
        border-radius: 15px;
        padding: 20px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        margin: 30px auto;
        text-align: center;
    }

    .profile-img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
        margin-left: 200px;
    }

    .info {
        font-family: 'Arial', sans-serif;
    }

    .label {
        font-size: 1.5rem;
        color: #333;
        margin-bottom: 10px;
    }

    .btn-kembali {
        display: inline-block;
        padding: 10px 20px;
        background-color: #ffc107;
        color: #fff;
        border-radius: 5px;
        text-decoration: none;
        font-weight: bold;
        margin-top: 20px;
        transition: background-color 0.3s ease;
    }

    .btn-kembali:hover {
        background-color: #0056b3;
    }
</style>

<div class="card">
    <!-- Menampilkan gambar profil pengguna -->
    <img src="{{ Storage::url('uploads/' . $user->foto) }}" alt="Profile Picture" class="profile-img">

    <!-- Menampilkan informasi pengguna (nama, npm, dan kelas) -->
    <div class="info">
        <h1 class="label">{{ $user->nama }}</h1>
        {{-- <h1 class="label">{{ $user->npm }}</h1> --}}
        <h1 class="label">{{ $user->semester }}</h1>
        <h1 class="label">{{ $nama_kelas ?? 'Kelas tidak ditemukan' }}</h1>
        <h1 class="label">{{ $user->fakultas->nama_fakultas}}</h1>
        <h1 class="label">{{ $user->jurusan }}</h1>
        <a href="{{ route('user.list') }}" class="btn-kembali">Kembali ke List</a>
    </div>
</div>

@endsection
