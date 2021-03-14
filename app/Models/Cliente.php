<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'estado',
        'cidade',
        'data_de_nascimento',
    ];

    protected $dates = ['data_de_nascimento'];

    public function planos()
    {
        return $this->belongsToMany(Plano::class, 'cliente_plano');
    }
}
