<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mensaje extends Model
{
    use HasFactory;

    protected $table='mensajes';
    protected $primaryKey='id';
    protected $fillable =[
        'id_ticket',
        'id_emisor',
        'descripcion',
        'mensaje',
    ];

    public $timestamps = false;

    public function ticket(): BelongsTo
    {
        return $this->belongsTo(Ticket::class, 'id_ticket');
    }

    public function agente(): BelongsTo
    {
        return $this->belongsTo(Agente::class, 'id_emisor');
    }

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }
}
