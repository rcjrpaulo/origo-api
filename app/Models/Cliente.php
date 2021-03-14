<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use HasFactory, SoftDeletes;

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

    public function planoFree()
    {
        return $this->belongsToMany(Plano::class, 'cliente_plano')->where('nome', '=', 'Free');
    }

    public function getCannotDeleteAttribute()
    {
        if ($this->estado == 'São Paulo' && $this->planoFree()->exists()) {
            return true;
        }

        return false;
    }
}
