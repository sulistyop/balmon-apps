<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = "pegawais";
    protected $primaryKey = "id";
    protected $fillable = [
        'id',
        'nip',
        'nama',
        'pangkat',
        'golongan',
        'jabatan',
        'foto',
    ];
    public function perangkat()
    {
        return $this->hasMany(Perangkat::class);
    }
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
