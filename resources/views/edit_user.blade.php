@extends('layouts.app')

@section('title', 'Registrasi Pengguna')

@section('content')
<style>
    .container {
        background-color: #ffffff;
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        max-width: 600px;
        width: 100%;
        max-height: 900px;
    }

    select {
        background-color: #f8f9fa;
        color: #000000;
    }

    .form-buttons {
        display: flex;
        justify-content: space-between;
    }

    .btn-back{
        font-weight: bold;
    }

    .btn-submit {
        background-color: #ffc107;
        border-color: #ffc107;
        color: #ffffff;
        width : 100px;
    }

    .btn-submit:hover {
        background-color: #e0a800;
        border-color: #d39e00;
    }
</style>

<h1>Update Pengguna</h1>
<a href="{{ route('user.list') }}" class="btn btn-success"></a>
<form action="{{ route('user.update', $user['id']) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama Anda" value="{{old('nama',$user->nama)}}">
        @foreach($errors->get('nama') as $msg)
            <p class="text-danger">{{$msg}}</p>
        @endforeach
    </div>

    <div class="mb-3">
        <label for="semester" class="form-label">Semester</label>
        <input type="number" class="form-control" id="npm" name="npm" placeholder="Masukkan semester Anda" value="{{old('semester',$user->semester)}}">
        @foreach($errors->get('semester') as $msg)
            <p class="text-danger">{{$msg}}</p>
        @endforeach
    </div>

    {{-- <div class="mb-3">
        <label for="npm" class="form-label">NPM</label>
        <input type="text" class="form-control" id="npm" name="npm" placeholder="Masukkan NPM Anda" value="{{old('nama',$user->npm)}}">
        @foreach($errors->get('npm') as $msg)
            <p class="text-danger">{{$msg}}</p>
        @endforeach
    </div> --}}

    <div class="mb-3">
        <label for="kelas" class="form-label">Kelas</label>
        <select name="kelas_id" id="kelas_id" class="form-control">
            @foreach ($kelas as $kelasItem)
                <option value="{{ $kelasItem->id }}"
                    {{ $kelasItem->id == $user->kelas_id? 'selected' : '' }}>
                    {{ $kelasItem->nama_kelas }}
                </option>
            @endforeach
        </select>
        @foreach($errors->get('kelas_id') as $msg)
            <p class="text-danger">{{$msg}}</p>
        @endforeach
    </div>

    <div class="mb-3">
        <label for="fakultas_id" class="form-label">Fakultas</label>
        <select name="fakultas_id" id="fakultas_id" class="form-control">
            @foreach ($fakultas as $fakultasItem) <!-- Ubah $kelas menjadi $fakultas -->
                <option value="{{ $fakultasItem->id }}"
                    {{ $fakultasItem->id == $user->fakultas_id ? 'selected' : '' }}>
                    {{ $fakultasItem->nama_fakultas }}
                </option>
            @endforeach
        </select>
        @foreach($errors->get('fakultas_id') as $msg)
            <p class="text-danger">{{ $msg }}</p>
        @endforeach
    </div>


    <div class="mb-3">
        <label for="jurusan" class="form-label">Jurusan</label>
        <select name="jurusan" id="jurusan" class="form-control" required>
            <option value="">Pilih Jurusan</option>
            <option value="Fisika" {{ old('jurusan', $user->jurusan) == 'Fisika' ? 'selected' : '' }}>Fisika</option>
            <option value="Kimia" {{ old('jurusan', $user->jurusan) == 'Kimia' ? 'selected' : '' }}>Kimia</option>
            <option value="Biologi" {{ old('jurusan', $user->jurusan) == 'Biologi' ? 'selected' : '' }}>Biologi</option>
            <option value="Matematika" {{ old('jurusan', $user->jurusan) == 'Matematika' ? 'selected' : '' }}>Matematika</option>
            <option value="Ilmu Komputer" {{ old('jurusan', $user->jurusan) == 'Ilmu Komputer' ? 'selected' : '' }}>Ilmu Komputer</option>
        </select>
        @foreach($errors->get('jurusan') as $msg)
            <p class="text-danger">{{ $msg }}</p>
        @endforeach
    </div>


    <div class="form-group">
        <label for="foto">Foto:</label><br>
        <input type="file" id="foto" name="foto"><br><br>
        @if($user->foto)
        <img src="{{ Storage::url('uploads/' . $user->foto) }}" alt="Profile Picture" class="profile-img" width="100">
        @endif
    </div>
    <br>
    <div class="form-buttons">
        <a href="{{ route('user.list') }}" class="btn btn-danger btn-back">Kembali</a>
        <input type="submit" class="btn btn-primary btn-submit" value="Submit">
    </div>
</form>
@endsection
