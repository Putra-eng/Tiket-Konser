<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
    protected $table = 'pembeli';
    protected $primaryKey = 'id_pembeli';

    protected $fillable = ['nama', 'no_hp'];

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'id_pembeli');
    }
}
