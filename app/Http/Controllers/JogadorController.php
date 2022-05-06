<?php

namespace App\Http\Controllers;

use App\Models\Clubes;
use App\Models\Jogador;
use App\Models\Posicao;
use Illuminate\Http\Request;

class JogadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jogador = new Jogador();
        $jogadores = Jogador::All();
        $clubes = Clubes::All();
        $posicoes = Posicao::All();

        return view('jogador.index', [
            'jogador' => $jogador,
            'jogadores' => $jogadores,
            'clubes' => $clubes,
            'posicoes' => $posicoes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate(
            [
                'nome' => 'required|max:100',
                'dataNasc' => 'required',
                'clube_id' => 'required',
                'posicao_id' => 'required'
            ],
            [
                'nome.required' => 'Insira o nome do jogador',
                'nome.max' => 'Quantidade máxima de letras :max',

                'dataNasc.required' => 'Insira a Data de Nascimento do jogador',

                'clube_id.required' => 'Selecione o clube',

                'posicao_id.required' => 'Seleciona a posição do jogador'
            ]
        );

        if ($request->get('id') != '') {
            $jogador = Jogador::Find($request->get('id'));
        } else {
            $jogador = new Jogador();
        }

        $jogador->nome = $request->get('nome');

        if($request->get('checagem') == 'on'){
            $jogador->checagem = true;
        }else{
            $jogador->checagem = false;
        }
        

        if ($request->get('dataNasc') < \Carbon\Carbon::now()) {
            $jogador->data_nasc = $request->get('dataNasc');
            $jogador->clube_id = $request->get('clube_id');
            $jogador->posicao_id = $request->get('posicao_id');

            $jogador->save();
        }


        return redirect('/jogador');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jogador = jogador::Find($id);
        $jogadores = jogador::All();
        $posicao = Posicao::Find($id);
        $posicoes = Posicao::All();
        $clube = Clubes::All();
        $clubes = Clubes::All();


        return view("jogador.index", [
            "jogador" => $jogador,
            "jogadores" => $jogadores,
            "posicao" => $posicao,
            "posicoes" => $posicoes,
            "clube" => $clube,
            "clubes" => $clubes
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $jogador = Jogador::Find($id);
        $jogador->save();
        return redirect("/jogador");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jogador::Destroy($id);
        return redirect("/jogador");
    }
}
