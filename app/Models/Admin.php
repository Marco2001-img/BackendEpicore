<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Model
{
    use HasFactory,Notifiable,HasApiTokens;


    protected $table = 'admins';
    protected $guard_name = 'admin';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nombre',
        'telefono',
        'email',
        'password',
        'estatus'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function sedes(): HasMany
    {
        return $this->hasMany(Sede::class, 'id_admin');
    }

    // public function sendPasswordResetNotification($token)
    // {
    //     $this->notify(new CustomResetPasswordNotification($token));
    // }
}
