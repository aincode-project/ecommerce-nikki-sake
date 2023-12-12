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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->date('tanggal_transaksi')->useCurrent();
            $table->string('nama_penerima');
            $table->string('alamat');
            $table->string('no_telp');
            $table->integer('subtotal');
            $table->integer('biaya_pengiriman');
            $table->integer('total_transaksi');
            $table->string('status_transaksi');
            $table->string('bukti_transfer')->nullable();
            $table->string('kurir')->nullable();
            $table->string('no_resi')->nullable();
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
        Schema::dropIfExists('transaksis');
    }
};
