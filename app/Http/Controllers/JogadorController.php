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
        $request->validate([
            'nome' => 'required|max:100',
            'dataNasc' => 'required',
            'clbAtual' => 'required',
            'posicao' => 'required'
        ],
        [
            'nome.required' => 'Insira o nome do jogador',
            'nome.max' => 'Quantidade máxima de letras :max',

            'dataNasc.required' => 'Insira a Data de Nascimento do jogador',

            'clbAtual.required' => 'Seleciona o clube',

            'posicao.required' => 'Seleciona a posição do jogador'
        ]
        );
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
