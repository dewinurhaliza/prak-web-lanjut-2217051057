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
            height: 800px;
        }
</style>
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
            <label for="npm" class="form-label">NPM</label>
            <input type="text" class="form-control" id="npm" name="npm" placeholder="Masukkan NPM Anda">
            @foreach($errors->get('npm') as $msg)
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
        <label for="foto">Foto:</label><br>
        <input type="file" id="foto" name="foto"><br><br>


        <input type="submit" class="btn btn-primary btn-submit" value="Submit">
    </form>
@endsection

