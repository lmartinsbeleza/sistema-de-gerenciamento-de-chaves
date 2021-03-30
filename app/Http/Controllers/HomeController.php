<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chave;

class HomeController extends Controller
{
    protected $chave;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Chave $chave)
    {
        $this->middleware('auth');
        $this->chave = $chave;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $chave = $this->chave->latest()->simplePaginate(10);
        $quantidadeChaves = $this->chave->quantidade();
        return view('dashboard', [
            'chaves' => $chave,
            'quantidadeChaves' => $quantidadeChaves
        ]);
    }
}
