<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'user';
    protected $guarded = ['id'];

    protected $fillable = [
        'nama',
        'npm',
        'kelas_id',
        'foto',
        'semester',
        'fakultas_id',
        'jurusan',
    ];

    public function getUser(){
        return $this->join('kelas', 'kelas.id', '=', 'user.kelas_id')->select('user.*', 'kelas.nama_kelas as nama_kelas')->get();
        return $this->join('fakultas', 'fakultas.id', '=', 'user.fakultas_id')->select('user.*', 'fakultas.nama_fakultas as nama_fakultas')->get();
    }



    public function kelas(){
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }


    public function fakultas(){
        return $this->belongsTo(Fakultas::class, 'fakultas_id');
    }
}
