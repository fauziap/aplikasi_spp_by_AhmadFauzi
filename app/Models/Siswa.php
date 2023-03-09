<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Model;



class Siswa extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'm_siswa';
    protected $guarded = [];


    /**
     * Get all of the kelas for the Siswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kelas()
    {
        return $this->hasOne(Kelas::class, 'id', 'kelas_id');
    }

    /**
     * Get the spp associated with the Siswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function spp()
    {
        return $this->hasOne(Spp::class,'id', 'spp_id');
    }

    /**
     * Get the pembayaran that owns the Siswa
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class, 'id', 'siswa_id');
    }
}
