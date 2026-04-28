<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanan';
    protected $primaryKey = 'id_pemesanan';

    protected $fillable = [
        'id_pembeli',
        'id_tiket',
        'jumlah',
        'total_harga'
    ];

    public function pembeli()
    {
        return $this->belongsTo(Pembeli::class, 'id_pembeli');
    }

    public function tiket()
    {
        return $this->belongsTo(Tiket::class, 'id_tiket');
    }
}
