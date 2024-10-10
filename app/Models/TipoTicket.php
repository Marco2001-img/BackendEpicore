<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TipoTicket extends Model
{
    use HasFactory;

    protected $table='tipo_tickets';
    protected $primaryKey='id';
    protected $fillable = 'nombre';

    public function ticket(): HasOne
    {
        return $this->hasOne(Ticket::class, 'id_tipo_ticket');
    }
}
