<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perangkat extends Model
{
    use HasFactory;
    protected $table = "perangkats";
    protected $primaryKey = "id";
    protected $fillable = [
        'id',
        'id_kategori',
        'no_seri',
        'nama_perangkat',
        'stok',
        'tahun_pengadaan',
        'type_perangkat',
        'pegawai_id',

    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id', 'id');
    }

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'peminjaman_id', 'id');
    }

    public function kategori()
    {
        return $this->belongsTo(KategoriPerangkat::class, 'id_kategori', 'id');
    }
 
}
