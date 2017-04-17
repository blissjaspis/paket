<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $guarded = [];

    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }
}
