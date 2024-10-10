<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Departamento extends Model
{
    use HasFactory;

    protected $table='departamentos';
    protected $primaryKey='id';
    protected $fillable = [
        'id_sede',
        'nombre',
        'descripcion',
        'estatus',
    ];

    public $timestamps = false;

    public function sede(): BelongsTo
    {
        return $this->belongsTo(Sede::class, 'id_sede');
    }
}
