<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chave;
use App\Models\Sala;

class ChaveController extends Controller
{
    private $chave, $sala;

    public function __construct(Chave $chave, Sala $sala)
    {
        $this->chave = $chave;
        $this->sala = $sala;
    }

    public function index()//função de listar
    {
        $chave = $this->chave->latest()->paginate();//agregar a variavel chave todas as chaves existentes no banco de dados

        return view('chave.index', [//mandar para a view de listagem
            'chaves' => $chave,
        ]);
    }

    public function create()//função que vai mandar para a view de criação
    {
        $sala = $this->sala->get();//pega todas informações de salas para mandar para a view de criação

        return view('chave.create',[//manda para view de criação
            'sala' => $sala,
        ]);
    }

    public function store(Request $request)//função de salvar um nova chave
    {
        $sala = $this->sala;//agrega a informações da classe sala para a variavel sala
        $chave = $this->chave;//agrega a informações da classe chave para a variavel chave
        if ($request->name){//verifica se foi passado um nome para adicionar uma nova sala
            $sala->sala = $request->name;
            $sala->save();
            $sala = $sala->id;
        }

        //salva as informações de chave
        $chave->codigo = $request->codigo;
        if ($request->name)
            $chave->sala = $sala;
        else
            $chave->sala = $request->sala;

        $chave->status = 1;
        $chave->save();

        return redirect()->route('chave.index')->with('mensagem', "Chave Cadastrada com sucesso!");//redireciona para a routa de listagem de chaves
    }

    public function edit($id)//função para mandar pra view
    {
        $chave = $this->chave->where('id', $id)->first();
        $sala = $this->sala->get();

        return view('chave.edit', [//manda pra view de edição de chave na pasta chave
            'chave' => $chave,
            'sala' => $sala
        ]);
    }

    public function update($id, Request $request)//atualiza as informações de chave
    {
        $chave = $this->chave->where('id', $id)->first();//pega a chave de id especifica
        if ($chave)
            return redirect()->back();

        $chave->where('id', $id)->update([//atualiza as informações de chave
            'codigo' => $request->codigo,
            'sala' => $request->sala,
            'status' => 1
        ]);

        return redirect()->route('chave.index')->with('mensagem', "Chave Editada com sucesso!");//redireciona para a routa de listagem
    }

    public function destroy($id)//função para apagar a chave do banco de dados
    {
        $chave = $this->chave->where('id', $id)->first();//pega a chave de id especifico
        $chave->destroy($id);

        return redirect()->route('chave.index')->with('mensagem', "Chave Deletada com sucesso!");//redireciona para a routa de listagem
    }
}
