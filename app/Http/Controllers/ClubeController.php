<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clubes;

class ClubeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clube = new Clubes();
        $clubes = Clubes::All();

        return view(
            'clube.index',
            [
                'clube' => $clube,
                'clubes' => $clubes
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
            [
                'nome' => 'required|unique:clube|max:100',
                'escudo' => 'required|mimes:jpg,png'
            ],
            [
                'nome.required' =>  "O campo nome é obrigatório",
                'nome.unique' => 'Clube já cadastrado',
                'nome.max' => "O campo nome aceita no máximo :max caracteres",

                'escudo.required' => 'Escolha uma foto do seu clube',
                'escudo.mimes' => 'Imagens suportadas :mimes'
            ]
        );

        // verificando se o id já existe, se não, iremos criar um novo
        if ($request->get('id') != '') {
            $clube = Clubes::Find($request->get('id'));
        } else {
            $clube = new Clubes();
        }

        $clube->nome = $request->get('nome');

        // verificando se foi enviado uma foto
        if ($request->file('escudo') != null) {
            $clube->escudo = $request->file('escudo')->store('public/clube-images');
        }

        $clube->save();

        return redirect('/clube');
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
        Clubes::Destroy($id);
        return redirect('/clube');
    }
}
