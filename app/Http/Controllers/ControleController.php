<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Controle;
use App\Models\Chave;
use Illuminate\Support\Facades\Auth;

class ControleController extends Controller
{
    protected $controle, $chave;

    public function __construct(Controle $controle, Chave $chave)
    {
        $this->controle = $controle;
        $this->chave = $chave;
    }

    public function pegar()
    {
        $chave = $this->chave->get();
        return view('controle.pegar', [
            'chave' => $chave
        ]);
    }

    public function retirar(Request $request)
    {
        $controle = $this->controle;
        $chave = $this->chave->where('codigo', $request->codigo)->first();

        $controle->retirou = Auth::user()->name;
        $controle->chave = $chave->id;
        $controle->save();

        $chave->where('codigo', $request->codigo)->update([
            'status' => 2,
        ]);

        return redirect()->route('dashboard');
    }

    public function devolver()
    {
        $chave = $this->chave->get();
        return view('controle.devolver', [
            'chave' => $chave
        ]);
    }

    public function entregar(Request $request)
    {
        $chave = $this->chave->where('codigo', $request->codigo)->first();
        $controle = $this->controle->where('chave', $chave->id)->orderBy('id', 'desc')->first();

        if(!$controle)
            return redirect()->back();

        $controle->update([
            'devolveu' => Auth::user()->name
        ]);

        return redirect()->route('dashboard');
    }
}
