<?php

namespace App\Http\Controllers;

use App\Models\Posicao;
use Illuminate\Http\Request;

class PosicaoController extends Controller
{


    public function index()
    {
        $pos = new Posicao();
        $posicoes = Posicao::All();
        return view(
            'posicao.index',
            [
                "pos" => $pos,
                'posicoes' => $posicoes
            ]
        );
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
            ['descricao' => 'required|unique:posicao|max:50'],
            [
                'descricao.required' => 'Insira a descrição',
                'descricao.unique' => 'Posição já cadastrada',
                'descricao.max' => 'O campo descricao aceita no máximo :max caracteres'
            ]

        );

        if ($request->get('id') != '') {
            $pos = Posicao::Find($request->get('id'));
        } else {
            $pos = new Posicao();
        }

        $pos->descricao = $request->get('descricao');

        $pos->save();


        return redirect('/posicao');
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
        $pos = Posicao::Find($id);
        $posicoes = Posicao::All();

        return view('posicao.index', [
            'pos' => $pos,
            'posicoes' => $posicoes
        ]);
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
        Posicao::Destroy($id);
        return redirect('posicao');
    }
}
