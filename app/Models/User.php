<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     * Include 'is_delete' so you can update it.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_delete',
    ];

    /**
     * The attributes that should be hidden for arrays and JSON.
     * Hides sensitive data like password and remember token.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed', // Laravel 12+ auto hashing
        'is_delete' => 'boolean', // Cast is_delete as boolean
    ];
     public function myCourses()
     {
            return $this->hasMany(MyCourse::class);
    }

}
