<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Controle extends Model
{
    use HasFactory;

    protected $fillable = [
        'retirou',
        'devolveu',
        'chave',
        'dataRetirar',
        'dataDevolver'
    ];

    public function retirou()//função para pegar as informações da chave estrangeira de user
    {
        return $this->belongsTo(User::class, 'retirou','id');
    }
}
