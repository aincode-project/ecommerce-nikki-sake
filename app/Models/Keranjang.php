<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;

    protected $table = 'keranjangs';

    protected $fillable = [
        'jumlah',
        'barang_id',
        'customer_id',
    ];

    public function barang(){
    	return $this->belongsTo('App\Models\Barang');
    }

    public function customer(){
    	return $this->belongsTo('App\Models\Customer');
    }
}
