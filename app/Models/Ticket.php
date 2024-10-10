<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;

class Ticket extends Model
{
    use HasFactory,HasApiTokens;

    protected $table='tickets';
    protected $guard_name = 'agentes';
    protected $primaryKey='id';
    protected $fillable =[
        'id_cliente',
        'id_agente',
        'prioridad_ticket',
        'id_tipo_ticket',
        'nombre_ticket',
        'estado_ticket',
        'asunto',
        'estatus'
    ];
    public $timestamps=true;



    public function tipo(): BelongsTo
    {
        return $this->belongsTo(TipoTicket::class, 'id_tipo_ticket',);
    }


    public function agente(): BelongsTo
    {
        return $this->belongsTo(Agente::class, 'id_agente');
    }

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function mensaje(): HasMany
    {
        return $this->hasMany(Mensaje::class, 'id_ticket');
    }
}
