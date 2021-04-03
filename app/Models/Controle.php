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

    public function retirou()
    {
        return $this->belongsTo(User::class, 'retirou','id');
    }
}
