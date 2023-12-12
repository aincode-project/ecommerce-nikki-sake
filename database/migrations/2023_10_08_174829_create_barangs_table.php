<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang')->unique();
            $table->integer('harga_barang');
            $table->integer('stok_barang');
            $table->string('image_barang')->nullable();
            $table->unsignedBigInteger('jenis_barang_id');
            $table->foreign('jenis_barang_id')->references('id')->on('jenis_barangs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barangs');
    }
};
