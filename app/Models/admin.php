<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id';

    protected $fillable = ['nama', 'email', 'password'];

    protected $hidden = ['password'];
}
