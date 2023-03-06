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
        Schema::table('m_siswa', function (Blueprint $table) {
            $table->unsignedBigInteger('kelas_id')->after('nama');
            $table->unsignedBigInteger('spp_id')->after('no_telp');

            $table->foreign('kelas_id')->references('id')->on('m_kelas')->onDelete('cascade');
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
        Schema::table('m_siswa', function (Blueprint $table) {
            $table->dropForeign('m_siswa_kelas_id_foreign');
            $table->dropForeign('m_siswa_spp_id_foreign');
        });
    }
};
