<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sede extends Model
{
    use HasFactory;

    protected $table = 'sedes';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_admin',
        'nombre',
        // 'RFC',
        'dato_sede',
        'contacto_sede',
        'estatus'
    ];

    public $timestamps = false;

    protected function casts(): array
    {
        return [
            'dato_sede' => 'array',
            'contacto_sede' => 'array',
        ];
    }


    public function departamentos(): HasMany
    {
        return $this->hasMany(Departamento::class, 'id_sede');
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'id_admin');
    }
}
