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
        Schema::table('pembayaran', function (Blueprint $table) {
            $table->unsignedBigInteger('petugas_id')->after('id');
            $table->unsignedBigInteger('siswa_id')->after('petugas_id');
            $table->unsignedBigInteger('spp_id')->after('thn_dibayar');

            $table->foreign('petugas_id')->references('id')->on('m_petugas')->onDelete('cascade');
            $table->foreign('siswa_id')->references('id')->on('m_siswa')->onDelete('cascade');
            $table->foreign('spp_id')->references('id')->on('spp')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pembayaran', function (Blueprint $table) {
            $table->dropForeign('pembayaran_petugas_id_foreign');
            $table->dropForeign('pembayaran_siswa_id_foreign');
            $table->dropForeign('pembayaran_spp_id_foreign');
        });
    }
};
