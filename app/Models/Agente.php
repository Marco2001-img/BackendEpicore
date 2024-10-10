<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Agente extends Model
{
    use HasFactory,Notifiable,HasApiTokens;


    protected $table='agentes';
    protected $primaryKey='id';
    protected $guard_name = 'agentes';
    protected $fillable =[
        'id_departamento',
        'id_grupo',
        // 'icono',
        'nombre',
        'email',
        'password',
        'telefono',
        'estado_agente',
        'estatus'
    ];

    public $timestamps = false;

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

    public function ticket(): HasMany
    {
        return $this->hasMany(Ticket::class, 'id_agente');
    }

    public function mensajes(): HasMany
    {
        return $this->hasMany(Mensaje::class, 'id_emisor');
    }

    public function grupo(): BelongsTo
    {
        return $this->belongsTo(Grupo::class, 'id_grupo');
    }


    // public function sendPasswordResetNotification($token)
    // {
    // $this->notify(new CustomResetPasswordNotification($token));
    // }

}
