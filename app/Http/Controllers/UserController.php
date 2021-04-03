<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {

        $user = $this->user->where('id', '!=', 1)->latest()->paginate();

        return view('user.index', [
            'users' => $user
        ]);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $user = $this->user;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->cargo = 2;
        $user->save();

        return redirect()->route('user.index')->with('mensagem', "Usuário Cadastrado com sucesso!");
    }

    public function edit($id)
    {
        $user = $this->user->where('id', $id)->first();
        return view('user.edit',[
            'user' => $user
        ]);
    }

    public function update($id, Request $request)
    {
        $user = $this->user->where('id', $id)->first();
        if(!$user)
            return redirect()->back();

        $user->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        if (Auth::user()->cargo == 1)
            return redirect()->route('user.index')->with('mensagem', "Usuário Editado com sucesso!");
        else
            return redirect()->route('dashboard')->with('mensagem', "Usuário Editado com sucesso!");
    }

    public function show()
    {
        $user = $this->user->where('id', Auth::id())->first();

        return view('user.edit',[
            'user' => $user
        ]);
    }

    public function destroy($id)
    {
        $user = $this->user;

        $user->destroy($id);

        return redirect()->route('user.index')->with('mensagem', "Usuário Deletado com sucesso!");
    }
}
