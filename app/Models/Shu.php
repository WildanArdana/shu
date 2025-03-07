<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Shu extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['nama_anggota', 'no_anggota', 'nominal_shu'];
}
