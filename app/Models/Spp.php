<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spp extends Model
{
    use HasFactory;
    protected $table = 'spp';

    protected $guarded = [];

    /**
     * Get the user that owns the Spp
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function siswa()
    {
        return $this->belongsTo(Siswa::class,'spp_id','id');
    }

    /**
     * Get the pembayaran that owns the Spp
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class, 'id', 'spp_id');
    }
}
