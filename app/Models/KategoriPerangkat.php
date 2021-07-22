<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPerangkat extends Model
{
    use HasFactory;
    protected $table = "kategori_perangkats";
    protected $primaryKey = "id";
    protected $fillable = [
        'id',
        'nama_kategori'
    ];

    public function perangkat()
    {
        return $this->hasMany(Perangkat::class);
    }
}

