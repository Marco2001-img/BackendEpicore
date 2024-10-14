<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;

class Cliente extends Model
{
    use HasFactory,HasApiTokens;

    protected $table = 'clientes';
    protected $primaryKey = 'id';
    protected $guard_name = 'clientes';
    protected $fillable = [
        // 'icono',
        'nombre_completo',
        'nombre_corto',
        'telefono',
        'email',
        'password',
        'observaciones',
        'estatus',
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

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class, 'id_cliente');
    }

    
    // public function sendPasswordResetNotification($token)
    // {
    //     $this->notify(new CustomResetPasswordNotification($token));
    // }
}
