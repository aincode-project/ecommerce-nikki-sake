<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = [
        'user_id',
        'nama_customer',
        'email',
        'no_telp',
        'alamat',
    ];

    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }

    public function keranjang(){
    	return $this->hasMany('App\Models\Keranjang');
    }

    public function transaksi(){
    	return $this->hasMany('App\Models\Transaksi');
    }
}
