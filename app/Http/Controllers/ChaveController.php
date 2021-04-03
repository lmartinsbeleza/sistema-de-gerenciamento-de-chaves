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

    public function index()
    {
        $chave = $this->chave->latest()->paginate();

        return view('chave.index', [
            'chaves' => $chave,
        ]);
    }

    public function create()
    {
        $sala = $this->sala->get();

        return view('chave.create',[
            'sala' => $sala,
        ]);
    }

    public function store(Request $request)
    {
        $sala = $this->sala;
        $chave = $this->chave;
        if ($request->name){
            $sala->sala = $request->name;
            $sala->save();
            $sala = $sala->id;
        }

        $chave->codigo = $request->codigo;
        if ($request->name)
            $chave->sala = $sala;
        else
            $chave->sala = $request->sala;

        $chave->status = 1;
        $chave->save();

        return redirect()->route('chave.index')->with('mensagem', "Chave Cadastrada com sucesso!");
    }

    public function edit($id)
    {
        $chave = $this->chave->where('id', $id)->first();
        $sala = $this->sala->get();

        return view('chave.edit', [
            'chave' => $chave,
            'sala' => $sala
        ]);
    }

    public function update($id, Request $request)
    {
        $chave = $this->chave->where('id', $id)->first();
        if ($chave)
            return redirect()->back();

        $chave->where('id', $id)->update([
            'codigo' => $request->codigo,
            'sala' => $request->sala,
            'status' => 1
        ]);

        return redirect()->route('chave.index')->with('mensagem', "Chave Editada com sucesso!");
    }

    public function destroy($id)
    {
        $chave = $this->chave->where('id', $id)->first();
        $chave->destroy($id);

        return redirect()->route('chave.index')->with('mensagem', "Chave Deletada com sucesso!");
    }
}
