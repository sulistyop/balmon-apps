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
        'id_perangkat',
        'no_seri',
        'nama_perangkat',
        'stok',
        'tahun_pengadaan',
        'pegawai_id',
        'type_perangkat',
    ];

    public function perangkat()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id', 'id');
    }
    // public function penimbangan()
    //{
    //    return $this->hasMany(Penimbangan::class);
    //}
}
