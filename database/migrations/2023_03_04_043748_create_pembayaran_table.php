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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('petugas_id')->constrained('m_petugas');
            // $table->foreignId('siswa_id')->constrained('m_siswa');
            $table->date('tgl_bayar');
            $table->string('bln_dibayar');
            $table->string('thn_dibayar');
            // $table->foreignId('spp_id')->constrained('spp');
            $table->integer('jmlh_bayar');
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
        Schema::dropIfExists('pembayaran');
    }
};
