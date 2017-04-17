<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Paket extends Model
{
    protected $guarded = [];

    protected $dates = ['tanggal_kirim'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bukus()
    {
        return $this->hasMany(Buku::class);
    }

    public function laporans()
    {
        return $this->hasMany(Laporan::class);
    }

    public function kota()
    {
        return $this->belongsTo(Kota::class);
    }

    public function scopeUserPaket($query)
    {
        return $query->where('kota_id', \Auth::user()->kotas->first()->id)->latest()->get();
    }
}
