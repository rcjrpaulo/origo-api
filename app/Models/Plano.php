<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plano extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nome',
        'valor_mensal'
    ];

    public function clientes()
    {
        return $this->belongsToMany(Cliente::class, 'cliente_plano');
    }
}
