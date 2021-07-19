<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = "peminjaman";
    protected $primaryKey = "id";
    protected $fillable = [
        'pegawai_id',
        'id_perangkat',
        'no_resi',
        'jumlah_barang',
        'tanggal_masuk',
        'tanggal_keluar',
        'keterangan',
    ];

    public function perangkat()
    {
        return $this->belongsTo(Perangkat::class, 'id_perangkat', 'id');
    }
    
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
