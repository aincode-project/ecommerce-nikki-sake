<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barangs';

    protected $fillable = [
        'nama_barang',
        'harga_barang',
        'stok_barang',
        'jenis_barang_id',
        'image_barang',
    ];

    public function scopeFilter($query, array $filters)
    {
        // if (isset($filters['search']) ? $filters['search'] : false) {
        //     return $query->where('nama_barang', 'like', '%' . $filters['search'] . '%');
        // }

        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('nama_barang', 'like', '%' . $search . '%');
        });

        $query->when($filters['category'] ?? false, function($query, $category) {
            return $query->whereHas('jenis_barang', function($query) use ($category) {
                $query->where('nama_jenis', $category);
            });
        });
    }

    public function jenis_barang()
    {
        return $this->belongsTo(JenisBarang::class);
    }

    public function keranjang(){
    	return $this->hasMany('App\Models\Keranjang');
    }

    public function detail_transaksi(){
    	return $this->hasMany('App\Models\DetailTransaksi');
    }
}
