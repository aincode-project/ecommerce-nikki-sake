<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksis';

    protected $fillable = [
        'customer_id',
        'user_id',
        'tanggal_transaksi',
        'nama_penerima',
        'alamat',
        'no_telp',
        'subtotal',
        'biaya_pengiriman',
        'total_transaksi',
        'status_transaksi',
        'bukti_transfer',
        'kurir',
        'no_resi'
    ];

    public function user(){
    	return $this->belongsTo('App\Models\User');
    }

    public function customer(){
    	return $this->belongsTo('App\Models\Customer');
    }

    public function detail_transaksi(){
    	return $this->hasMany('App\Models\DetailTransaksi');
    }
}
