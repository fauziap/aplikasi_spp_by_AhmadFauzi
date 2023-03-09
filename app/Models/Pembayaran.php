<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayaran';
    protected $guarded = [];

    /**
     * Get the petugas associated with the Pembayaran
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function petugas()
    {
        return $this->hasOne(Petugas::class, 'id', 'petugas_id');
    }

    /**
     * Get the siswa associated with the Pembayaran
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function siswa()
    {
        return $this->hasOne(Siswa::class, 'id', 'siswa_id');
    }

    /**
     * Get the spp associated with the Pembayaran
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function spp()
    {
        return $this->hasOne(Spp::class, 'id', 'spp_id');
    }
}
