<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Laporan extends Model
{
    protected $guarded = [];

    protected $dates = ['tanggal_diterima'];

    public function paket()
    {
        return $this->belongsTo(Paket::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
