<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['nama_anggota', 'no_anggota', 'role'];

    protected $hidden = ['remember_token'];
}
