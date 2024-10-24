@extends('layouts.app')

@section('title', 'Registrasi Pengguna')

@section('content')
<style>
    .container {
            background-color: #ffffff;
            padding-top: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            max-width: 600px;
            width: 100%;
            max-height: 1000px;
        }
</style>
<br><br><br><br><br><br><br>
    <h1>Registrasi Pengguna</h1>
    <a href="{{ route('user.list') }}" class="btn btn-success" style="font-weight: bold">List User</a>
    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama Anda">
            @foreach($errors->get('nama') as $msg)
                <p class="text-danger">{{$msg}}</p>
            @endforeach
        </div>

        <div class="mb-3">
            <label for="semester" class="form-label">Semester</label>
            <input type="number" class="form-control" id="semester" name="semester" placeholder="Masukkan semester Anda">
            @foreach($errors->get('semester') as $msg)
                <p class="text-danger">{{$msg}}</p>
            @endforeach
        </div>

        <div class="mb-3">
            <label for="kelas" class="form-label">Kelas</label>
            <select name="kelas_id" id="kelas_id" class="form-control">
                @foreach ($kelas as $kelasItem)
                    <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
                @endforeach
            </select>
            @foreach($errors->get('kelas_id') as $msg)
                <p class="text-danger">{{$msg}}</p>
            @endforeach
        </div>

        <div class="mb-3">
            <label for="fakultas_id" class="form-label">Fakultas</label>
            <select name="fakultas_id" id="fakultas_id" class="form-control">
                @foreach ($fakultas as $fakultasItem)
                    <option value="{{ $fakultasItem->id }}">{{ $fakultasItem->nama_fakultas }}</option>
                @endforeach
            </select>
            @foreach($errors->get('fakultas_id') as $msg)
                <p class="text-danger">{{ $msg }}</p>
            @endforeach
        </div>

        <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan</label>
            <select name="jurusan" id="jurusan" class="form-control">
                <option value="">Pilih Jurusan</option>
                <option value="Fisika">Fisika</option>
                <option value="Kimia">Kimia</option>
                <option value="Biologi">Biologi</option>
                <option value="Matematika">Matematika</option>
                <option value="Ilmu Komputer">Ilmu Komputer</option>
            </select>
            @foreach($errors->get('jurusan') as $msg)
                <p class="text-danger">{{ $msg }}</p>
            @endforeach
        </div>

        <div class="form-group">
            <label for="foto">Foto:</label><br>
            <input type="file" id="foto" name="foto"><br><br>
        </div>


        <input type="submit" class="btn btn-primary btn-submit" value="Submit">
    </form>
@endsection

     {{-- <div class="mb-3">
            <label for="npm" class="form-label">NPM</label>
            <input type="text" class="form-control" id="npm" name="npm" placeholder="Masukkan NPM Anda">
            @foreach($errors->get('npm') as $msg)
                <p class="text-danger">{{$msg}}</p>
            @endforeach
        </div> --}}
