<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Grupo extends Model
{
    use HasFactory;

    protected $table='grupos';
    protected $primaryKey='id';
    protected $fillable =[
        'nombre',
        'descripcion',
        'estatus',
    ];

    public $timestamps = true;

    protected function casts(): array
    {
    return [
        'created_at' => 'datetime:d-m-y',
        'updated_at' => 'datetime:d-m-y'
        ];
    }

    public function cliente(): HasOne
    {
        return $this->hasOne(Agente::class, 'id_grupo');
    }
}
