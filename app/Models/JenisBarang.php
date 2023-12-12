<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBarang extends Model
{
    use HasFactory;

    protected $table = 'jenis_barangs';

    protected $fillable = [
        'nama_jenis',
        'image_jenis',
    ];

    public function barangs()
    {
        return $this->hasMany(Barang::class);
    }
}
