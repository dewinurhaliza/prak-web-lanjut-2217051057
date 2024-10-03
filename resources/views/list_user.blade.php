@extends('layouts.app')

@section('content')
<style>
    .table-hover tbody tr:hover {
        background-color: #ffe5b4; /* Kuning pastel */
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f8f9fa;
    }
    .table-striped tbody tr:nth-of-type(even) {
        background-color: #d1ecf1; 
    }
    .table-striped tbody tr:nth-of-type(3n) {
        background-color: #cce5ff;
    }
    .table-striped tbody tr:nth-of-type(4n) {
        background-color: #e2e3e5; 
    }
</style>
<div>
    <div class="mb-3">
        <h1>Daftar Pengguna</h1> 
        <a href="{{ route('user.create') }}" class="btn btn-primary">Tambah User</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NPM</th>
                    <th scope="col" class="text-center">Kelas</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->npm }}</td>
                    <td class="text-center">{{ $user->nama_kelas }}</td>
                    <td class="text-center">
                        <a class="btn btn-warning btn-sm">Edit</a>
                        <form method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?');">
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
@endsection
