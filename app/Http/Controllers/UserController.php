<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private $user;

    public function __construct(User $user)//Construtor
    {
        $this->user = $user;
    }

    public function index()//função de listar
    {
        $user = $this->user->where('id', '!=', 1)->latest()->paginate();//agrega a variavel user todas as informações de usuários fora o primeiro que é o user admin

        //redireciona direto para a view que vai mostrar as informações de usuários, além de enviar para a view tudo que tem na variavel user para se acessado através de uma
        //variavel users
        return view('user.index', [
            'users' => $user
        ]);
    }

    public function create()//função que vai mandar para a view de criação
    {
        return view('user.create');//manda diretamente para a view create na pasta user
    }

    public function store(Request $request)//função que vai salvar o novo usuário no banco de dados
    {
        $user = $this->user;//coloca todas as informações da classe user na variavel

        //coloca as informações adicionadas pelo usuário em cada campo da classe user para salvar
        $user->name = $request->name;//
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->cargo = 2;
        $user->save();

        return redirect()->route('user.index')->with('mensagem', "Usuário Cadastrado com sucesso!");//redireciona para a rota de listagem de usuários
    }

    public function edit($id)//função que vai mandar para view de edição de usuário
    {
        $user = $this->user->where('id', $id)->first();//coloca dentro da variavel user um usuário de id especifico para ser mandado para a edição de informações

        //redireciona diramente para a view que vai mostrar levando todas as informações de user
        return view('user.edit',[
            'user' => $user
        ]);
    }

    public function update($id, Request $request)//função de atualizar as informações do usuário no banco de dados
    {
        $user = $this->user->where('id', $id)->first();//pega o usuário com o id específico
        if(!$user)
            return redirect()->back()->with('mensagem', "Erro ao encontrar usuário");

        $user->where('id', $id)->update([//método para atualizar as informações do usuário através do que foi passado
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        if (Auth::user()->cargo == 1)// verifica se o usuário é admin
            return redirect()->route('user.index')->with('mensagem', "Usuário Editado com sucesso!");
        else//caso não seja
            return redirect()->route('dashboard')->with('mensagem', "Usuário Editado com sucesso!");
    }

    public function show()//função para editar as próprias informações
    {
        $user = $this->user->where('id', Auth::id())->first();//pega o usuário com o id específico

        //redireciona diramente para a view que vai mostrar levando todas as informações de user
        return view('user.edit',[
            'user' => $user
        ]);
    }

    public function destroy($id)//função para apagar o usuário do banco de dados
    {
        $this->user->destroy($id);//apaga do banco de dados o usuário de id especifico

        return redirect()->route('user.index')->with('mensagem', "Usuário Deletado com sucesso!");//redireciona para routa de listagem
    }
}
