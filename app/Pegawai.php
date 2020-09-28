<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    // Konfigurasi 
    protected $table = 'pegawai';
    protected $primaryKey = 'ID_Pegawai';
    protected $fillable = [
        'Nama_Depan',
        'Nama_Belakang',
        'Jenis_Kelamin',
        'Alamat',
        'Tempat_Lahir',
        'Tanggal_Lahir',
        'Jabatan',
        'Divisi',
        'Atasan',
        'Foto',
        'user_id',
    ];

    // Function
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function cuti()
    {
        return $this->hasMany(Cuti::class, 'Pegawai_ID');
    }

}
