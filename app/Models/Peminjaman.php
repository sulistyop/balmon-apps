<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = "peminjamen";
    protected $primaryKey = "id";
    protected $fillable = [
        'pegawai_id',
        'perangkat_id',
        'tanggal_masuk',
        'tanggal_keluar',
        'keterangan',
    ];

    public function perangkat()
    {
        return $this->belongsTo(Perangkat::class, 'perangkat_id', 'id');
    }
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
