<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;

    protected $table = 'detail_transaksis';

    protected $fillable = [
        'transaksi_id',
        'barang_id',
        'harga_barang',
        'jumlah',
    ];

    public function barang(){
    	return $this->belongsTo('App\Models\Barang');
    }

    public function transaksi(){
    	return $this->belongsTo('App\Models\Transaksi');
    }
}
