<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserModel;
use App\Models\Fakultas;

class UserController extends Controller
{
    public $userModel;
    public $kelasModel;


    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }


    public function index(){
    $data = [
        'title' => 'List User',
        'users' => $this->userModel->getUser(),
    ];

    return view('list_user', $data);
}


public function create(){
    $kelasModel = new Kelas();

    // Mengambil data kelas menggunakan method getKelas
    $kelas = $kelasModel->getKelas();
    $fakultas = Fakultas::all();

    $data = [
        'title' => 'Create User',
        'kelas' => $kelas,
        'fakultas' => $fakultas,
    ];

    return view('create_user', $data);
}

public function store(Request $request)
{
    // // Validasi input
    // $request->validate([
    //     'nama' => 'required',
    //     // 'npm' => 'required',
    //     'kelas_id' => 'required',
    //     'semester'=>'required|integer',
    //     'jurusan'=>'required',
    //     'fakultas_id' => 'required|integer',
    //     'foto' => 'image|file|max:2048', // Validasi foto
    // ]);

    // Proses upload foto
    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/uploads', $filename); // Menyimpan file ke storage

        // Simpan data user ke database
        $this->userModel->create([
            'nama' => $request->input('nama'),
            // 'npm' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id'),
            'semester'=> $request->input('semester'),
            'jurusan'=> $request->input('jurusan'),
            'fakultas_id' => $request->input('fakultas_id'),
            'foto' => $filename, // Menyimpan nama file ke database
        ]);
    }

    return redirect()->to('/')->with('success', 'User Berhasil dibuat');
}

public function edit($id){
    $user = UserModel::findOrFail($id);
    $kelasModel = new Kelas();
    $kelas = $kelasModel->getKelas();
    $fakultas = Fakultas::all();

    $title = 'Edit User';
    return view('edit_user', compact('user', 'kelas', 'fakultas', 'title'));
}

public function update(Request $request, $id)
{
    // $request->validate([
    //     'nama' => 'required',
    //     'kelas_id' => 'required',
    //     'fakultas_id' => 'required',
    //     'semester' => 'required|integer',
    //     'jurusan' => 'required',
    //     'foto' => 'image|file|max:2048',
    // ]);

    $user = UserModel::findOrFail($id);

    // Update data user lainnya
    $user->nama = $request->nama;
    $user->kelas_id = $request->kelas_id;
    $user->fakultas_id = $request->fakultas_id;
   // $user->semester = $request->semester;
    $user->jurusan = $request->jurusan;

    // Cek apakah ada file foto yang di-upload
    if ($request->hasFile('foto')) {
        // Hapus foto lama jika ada
        if ($user->foto && file_exists(storage_path('app/public/uploads/' . $user->foto))) {
            unlink(storage_path('app/public/uploads/' . $user->foto));
        }

        // Simpan file baru
        $newFilename = time() . '_' . $request->file('foto')->getClientOriginalName();
        $request->file('foto')->storeAs('public/uploads', $newFilename);
        $user->foto = $newFilename;
    }

    // Simpan perubahan pada user
    $user->save();

    return redirect()->route('user.list')->with('success', 'User Berhasil di Update');
}


public function destroy($id){
    $user = UserModel::findOrFail($id);
    $user->delete();

    return redirect()->to('/')->with('success', 'User Berhasil di Hapus');
}

public function show($id){

    $user = UserModel::findOrFail($id);
    $kelas = Kelas::find($user->kelas_id);
    $fakultas = Fakultas::find($user->fakultas_id);// Jika ingin menampilkan nama kelas

    return view('show_user', [
        'title' => 'Show User',
        'user' => $user,
        'nama_kelas' => $kelas ? $kelas->nama_kelas : null, // Pastikan nama kelas ada, jika tidak tampilkan null
    ]);

}

}
