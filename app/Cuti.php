<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    // Atribut
    protected $table = 'cuti';
    protected $primaryKey = 'ID_Cuti';
    protected $fillable = [
        'ID_Cuti',
        'Jenis_Cuti',
        'Tanggal_Pengajuan',
        'Tanggal_Mulai',
        'Tanggal_Berakhir',
        'Alasan',
        'Surat_Hamil',
        'Persetujuan',
        'Status',
        'Pegawai_ID',
    ];

    // Function 
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'ID_Pegawai');
    }

    public function perizinan()
    {
        return $this->hasOne(Perizinan::class, 'Cuti_ID');
    }
}
