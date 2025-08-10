<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password', 'role'];

    protected static function booted()
    {
        static::creating(function ($user) {
            $user->password = bcrypt($user->password); 
        });
    }
}
