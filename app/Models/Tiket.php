<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    protected $table = 'tiket';
    protected $primaryKey = 'id_tiket';

    protected $fillable = ['kategori', 'harga', 'stok'];

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'id_tiket');
    }
}
