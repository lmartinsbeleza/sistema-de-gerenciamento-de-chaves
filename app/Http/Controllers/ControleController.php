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

    public function agendar()
    {
        $chave = $this->chave->where('status', 1)->get();
        return view('controle.agendar', [
            'chave' => $chave,
        ]);
    }

    public function salvarAgendamento(Request $request)
    {
        $controle = $this->controle;
        $chave = $this->chave->where('codigo', $request->codigo)->first();

        $controle->retirou = Auth::id();
        $controle->chave = $chave->id;
        $controle->dataAgendou = (new \DateTime($request->dataRetirar." ".$request->horarioRetirar))->format('Y-m-d H:i:s');
        $controle->save();

        $chave->where('codigo', $request->codigo)->update([
            'status' => 3,
        ]);

        return redirect()->route('dashboard')->with('mensagem', "Chave agendada com sucesso!");
    }

    public function pegar()
    {
        $chave = $this->chave->where('status', 3)->get();

        return view('controle.pegar', [
            'chave' => $chave,
        ]);
    }

    public function retirar(Request $request)
    {
        $controle = $this->controle;
        $chave = $this->chave->where('codigo', $request->codigo)->first();

        $controle->where('chave', $chave->id)->orderBy('id', 'desc')->first()->update([
        'retirou' => Auth::id(),
        'chave' => $chave->id,
        'dataRetirar' => date('Y-m-d H:i:s'),
        ]);

        $chave->where('codigo', $request->codigo)->update([
            'status' => 2,
        ]);

        return redirect()->route('dashboard')->with('mensagem', "Chave Retirada com sucesso!");
    }

    public function devolver()
    {
        $chave = $this->chave->where('status', 2)->get();
        return view('controle.devolver', [
            'chave' => $chave,
        ]);
    }

    public function entregar(Request $request)
    {
        $chave = $this->chave->where('codigo', $request->codigo)->first();
        $controle = $this->controle->where('chave', $chave->id)->orderBy('id', 'desc')->first();
        if(!$controle)
            return redirect()->back();

        $controle->where('chave', $chave->id)->orderBy('id', 'desc')->first()->update([
            'devolveu' => Auth::id(),
            'dataDevolver' => date('Y-m-d H:i:s')
        ]);

        $chave->where('codigo', $request->codigo)->update([
            'status' => 1
        ]);

        return redirect()->route('dashboard')->with('mensagem', "Chave devolvida com sucesso!");
    }
}
