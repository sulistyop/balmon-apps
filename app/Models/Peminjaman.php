<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjaman';
    protected $fillable = [
        'pemasukan',
        'no_seri',
        'tanggal',
        'pengeluaran',
        'deskripsi',
        'perangkat_id',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function perangkat()
    {
        return $this->belongsTo(Perangkat::class);
    }
}
