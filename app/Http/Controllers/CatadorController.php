<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catador;

class CatadorController extends Controller
{
    public function get(Request $r) {
        return Catador::all();
    }

    public function post(Request $r) {
        $c = new Catador;
        $c->cpf = $r->cpf;
        $c->nome = $r->nome;
        $c->senha = $r->senha;
        $c->saveOrFail();

        return [
            'mensagem' => 'Cadastro realizado',
            'data' => $c
        ];
    }
}
