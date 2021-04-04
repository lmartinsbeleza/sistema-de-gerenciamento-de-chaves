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

    public function sala()//função para pegar as informações de sala pela chave estrangeira
    {
        return $this->belongsTo(Sala::class, 'sala', 'id');
    }

    public function status()//função para pegar as informações de status pela chave estrangeira
    {
        return $this->belongsTo(Status::class, 'status', 'id');
    }

    public function quantidade($tipo)//função para verificar a quantidade de chaves com cada status
    {
        switch ($tipo){
            case 1:
                return DB::table($this->model)->select(DB::raw('count(*) as quantidade'))->where('status', '=', '1')->first();
                break;

            case 2:
                return DB::table($this->model)->select(DB::raw('count(*) as quantidade'))->where('status', '=', '2')->first();
                break;

            case 3:
                return DB::table($this->model)->select(DB::raw('count(*) as quantidade'))->where('status', '=', '3')->first();
                break;

            case 4:
                return DB::table($this->model)->select(DB::raw('count(*) as quantidade'))->where('status', '=', '4')->first();
                break;
        }
    }

    public function controle()//função para pegar as informações da tabela cujo o id de chave é a chave estrangeira
    {
        return $this->hasMany(Controle::class, 'chave', 'id');
    }
}
