<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sala;
use App\Models\Status;
use App\Models\Controle;
use Illuminate\Support\Facades\DB;

class Chave extends Model
{
    use HasFactory;

    protected $model = 'chaves';
    protected $fillable = [
        'codigo',
        'sala',
        'status'
    ];

    public function sala()
    {
        return $this->belongsTo(Sala::class, 'sala', 'id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'status', 'id');
    }

    public function quantidade()
    {
        return DB::table($this->model)
            ->select('status', DB::raw('count(status) as quantidadeChaves'))
            ->groupBy('status')
            ->orderBy('status')
            ->get();
    }

    public function controle()
    {
        return $this->hasMany(Controle::class, 'chave', 'id');
    }
}
