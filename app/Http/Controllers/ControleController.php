<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Controle;
use App\Models\Chave;
use Illuminate\Support\Facades\Auth;

class ControleController extends Controller
{
    protected $controle, $chave;

    public function __construct(Controle $controle, Chave $chave)//Construtor
    {
        $this->controle = $controle;
        $this->chave = $chave;
    }

    public function agendar()//função que leva para a pagina de agendamento
    {
        $chave = $this->chave->where('status', 1)->get(); //pega todas as chaves que tem o status de disponível
        return view('controle.agendar', [ //redireciona para a view de agendar na pasta controle
            'chave' => $chave,
        ]);
    }

    public function salvarAgendamento(Request $request)//função para salvar o agendamento da chave
    {
        $controle = $this->controle;//adiciona a variavel controle as informações da classe controle
        $chave = $this->chave->where('codigo', $request->codigo)->first();//encontra qual chave foi selecionada para ser reservada e armazena na variavel chave

        //salva as informações em controle para gerenciar as informações
        $controle->retirou = Auth::id();
        $controle->chave = $chave->id;
        $controle->dataAgendou = (new \DateTime($request->dataRetirar." ".$request->horarioRetirar))->format('Y-m-d H:i:s');
        $controle->save();

        //atualiza as informações da chave que está sendo reservada para agendada
        $chave->where('codigo', $request->codigo)->update([
            'status' => 3,
        ]);

        return redirect()->route('dashboard')->with('mensagem', "Chave agendada com sucesso!");//redireciona para a rota da pagina inicial/dashboard
    }

    public function pegar()//função para mandar para a pagina de pegar a chave
    {
        $chave = $this->chave->where('status', 3)->get();//agregar todas as chaves que estão com status de agendada para a variavel chave

        return view('controle.pegar', [//mandar para a view pegar na pasta controle, junto com as informações na variavel chave
            'chave' => $chave,
        ]);
    }

    public function retirar(Request $request)//função que retira a chave agendada
    {
        $controle = $this->controle;//adiciona a variavel controle as informações da classe controle
        $chave = $this->chave->where('codigo', $request->codigo)->first();//encontra qual chave foi selecionada para ser reservada e armazena na variavel chave

        $controle->where('chave', $chave->id)->orderBy('id', 'desc')->first()->update([//atualiza as informações de controle para garantir um gerenciamento
        'retirou' => Auth::id(),
        'chave' => $chave->id,
        'dataRetirar' => date('Y-m-d H:i:s'),
        ]);

        $chave->where('codigo', $request->codigo)->update([//atualiza o status de chave para indisponível
            'status' => 2,
        ]);

        return redirect()->route('dashboard')->with('mensagem', "Chave Retirada com sucesso!");//redireciona para a rota da pagina inicial/dashboard
    }

    public function devolver()//função que vai mandar para a pagina de devolver chave
    {
        $chave = $this->chave->where('status', 2)->get();//agregar todas as chaves que estão com status de indisponível para a variavel chave
        return view('controle.devolver', [//mandar para a view pegar na pasta controle, junto com as informações na variavel chave
            'chave' => $chave,
        ]);
    }

    public function entregar(Request $request)//função para entregar a chave
    {
        $chave = $this->chave->where('codigo', $request->codigo)->first();//encontra a chave com codigo especifico
        $controle = $this->controle->where('chave', $chave->id)->orderBy('id', 'desc')->first();//pega as informações de controle com a chave encontrada para a atualização de informações
        if(!$controle)//verifica se esse controle já existia
            return redirect()->back();

        $controle->where('chave', $chave->id)->orderBy('id', 'desc')->first()->update([//atualiza as informações do controle para finalizar o gerenciamento da chave
            'devolveu' => Auth::id(),
            'dataDevolver' => date('Y-m-d H:i:s')
        ]);

        $chave->where('codigo', $request->codigo)->update([//atualiza o status da chave para disponível
            'status' => 1
        ]);

        return redirect()->route('dashboard')->with('mensagem', "Chave devolvida com sucesso!");//redireciona para a rota da pagina inicial/dashboard
    }
}
