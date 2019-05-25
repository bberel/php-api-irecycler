<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipiente;
use Illuminate\Support\Facades\DB;

class RecipienteController extends Controller
{
    public function get(Request $r) {
        // return Recipiente::with(['sensor_obj', 'recipiente_status_obj' => function($query) {
        //     $query->where('id', 1);
        // }])->get();
        return DB::select('SELECT R.id, R.data_hora, S.tipo_material, S.localizacao, S.latitude, S.longitude, R.nivel_ocupacao, RS.descricao_status FROM recipientes R
            INNER JOIN sensores AS S on S.id = R.id
            INNER JOIN recipientes_status AS RS ON RS.id=R.status
            WHERE R.status = ?
            GROUP BY R.id', [1]);
    }

    public function post(Request $r) {
        $r = new Recipiente;
        $r->id = $r->id;
        $r->sinal = $r->sinal;
        $r->voltagem = $r->voltagem;
        $r->nivel_ocupacao = $r->nivel_ocupacao;
        $r->lshh = $r->lshh;
        $r->lahh = $r->lahh;
        $r->lsh = $r->lsh;
        $r->lah = $r->lah;
        $r->lsl = $r->lsl;
        $r->lal = $r->lal;
        $r->lsll = $r->lsll;
        $r->lall = $r->lall;
        $r->status = $r->status;
        $r->saveOrFail();

        return [
            'mensagem' => 'Cadastro realizado',
            'data' => $r
        ];
    }
}
