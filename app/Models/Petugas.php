<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Model;


class Petugas extends Model
{
    use HasFactory, Notifiable;

    protected $guarded = [];
    protected $table = 'm_petugas';

    /**
     * Get the pembayaran that owns the Petugas
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class, 'id', 'petugas_id');
    }
}
