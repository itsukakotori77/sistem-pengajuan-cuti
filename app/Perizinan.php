<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perizinan extends Model
{
    //
    protected $table = 'perizinan';
    protected $primaryKey = 'ID_Perizinan';
    protected $fillable = [
        'ID_Perizinan',
        'Status_Perizinan',
        'Tanggal_Persetujuan',
        'Pemegang_Persetujuan',
        'Catatan',
        'Cuti_ID',
    ];

    // Function
    public function cuti()
    {
        return $this->belongsTo(Cuti::class, 'ID_Cuti');
    }
}
