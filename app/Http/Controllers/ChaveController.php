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
        $sala = $this->sala->get();

        return view('chave.index', [
            'chaves' => $chave,
            'sala' => $sala
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
        $chave = $this->chave->latest()->paginate();
        $chave->codigo = $request->codigo;
        $chave->sala = $request->sala;
        $chave->status = 1;
        $chave->save();

        return view('chave.index', [
            'chaves' => $chave,
        ]);
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
        $chaves = $this->chave->latest()->paginate();
        $chave = $this->chave->where('id', $id)->first();
        if ($chave)
            return redirect()->back();

        $chave->where('id', $id)->update([
            'codigo' => $request->codigo,
            'sala' => $request->sala,
            'status' => 1
        ]);

        return view('chave.index', [
            'chaves' => $chaves
        ]);
    }

    public function destroy($id)
    {
        $chaves = $this->chave->latest()->paginate();
        $chave = $this->chave->where('id', $id)->first();
        $chave->destroy($id);

        return view('chave.index', [
            'chaves' => $chaves
        ]);
    }
}
