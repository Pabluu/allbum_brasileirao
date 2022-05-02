@extends("templates.main")
@section("titulo_aba", "Cadastro de Posições")

@section("formulario")
<form action="/posicao" method="post" class='row'>
    <div class="form-group col-10">
        <label class='' for="">Descrição</label>
        <input type="text" @class(['form-control', 'is-invalid' => ($errors->first('descricao') != '')]) name='descricao' value='{{$pos->descricao}}'>

        <div class="invalid-feedback">
            {{$errors->first('descricao')}}
        </div>
    </div>

    <div class="form-group col-2">
        @csrf
        <input type="hidden" id='id' name='id' value='{{$pos->id}}'>
        <button submit='submit' class='btn btn-success' style='margin-top: 23px;'>
            <i class='bi bi-save'></i> Salvar
        </button>
    </div>

</form>
@endsection

@section('tabela')
<h1>Tabela de Posições de Jogadores</h1>

<table class="table table-striped table-hover">
    <colgroup>
        <col width='400'>
        <col width='100'>
        <col width='100'>
    </colgroup>

    <thead>
        <tr>
            <td>Descrição</td>
            <td>Editar</td>
            <td>Excluir</td>
        </tr>
    </thead>

    <tbody>
        @foreach($posicoes as $pos)
        <tr>
            <td>{{$pos->descricao}}</td>

            <td><a href='/posicao/{{$pos->id}}/edit' class='btn btn-warning'>
                    <i class="bi bi-pencil-square"></i>Editar
                </a></td>

            <td>
                <form action='/posicao/{{$pos->id}}' method='POST'>
                    @csrf
                    <input type='hidden' name='_method' value='DELETE'>
                    <button type="submit" class='btn btn-danger'>
                        <i class="bi bi-trash"></i>Excluir
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
@endsection