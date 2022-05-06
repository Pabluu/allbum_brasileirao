@extends("templates.main")
@section("titulo_aba", 'Cadastro de Jogadores')

@section('formulario')
<form action="/jogador" class='row' method='POST' enctype='multipart/form-data'>
    <input type="hidden" name="id" value="{{$jogador->id}}" />
    <h4>Cadastro de Jogadores</h4>

    <div class="form-group col-5">
        <label for="nome">Nome </label>
        <input type="text" name="nome" class="form-control" value="{{$jogador->nome}}" required />
    </div>

    <div class="form-group col-5">
        <label for="nome">Data de Nascimento </label>
        <input type="date" name="dataNasc" class="form-control" value="{{$jogador->dataNasc}}" required />
    </div>

    <div class="form-group col-5">
        <label for="nome">Posição do jogador </label>
        <select name="posicao_id" class="form-control" required>
            <option></option>
            @foreach ($posicoes as $posicao)
            @if ($posicao->id == $jogador->posicao_id)
            <option value="{{ $posicao->id }}" selected="selected">{{ $posicao->descricao }}</option>
            @else
            <option value="{{ $posicao->id }}">{{ $posicao->descricao }}</option>
            @endif
            @endforeach
        </select>
    </div>
    <div class="form-group col-5">
        <label for="nome">Clube do jogador </label>
        <select name="clube_id" class="form-control" required>
            <option></option>
            @foreach ($clubes as $clube)
            @if ($clube->id == $jogador->clube_id)
            <option value="{{ $clube->id }}" selected="selected">{{ $clube->nome }}</option>
            @else
            <option value="{{ $clube->id }}">{{ $clube->nome }}</option>
            @endif
            @endforeach
        </select>
    </div>

    <div class="form-group col-5">
        <label for="nome">Existe na coleção ?</label><br>
        <input type="checkbox" name="checagem" id="checagem">
        Sim</input>
    </div>

    <div class="form-group col-11">
        </br>
        @csrf
        <button type="submit" class="btn btn-success bottom">
            <i class="fas fa-save"></i>Salvar
        </button>
    </div>
</form>
@endsection

@section("tabela")
<br />
<h1>Clubes Cadastrados</h1>
<table class="table table-striped table-hover">
    <colgroup>
        <col width="50">
        <col width="170">
        <col width="150">
        <col width="10">
        <col width="10">
        <col width="10">
    </colgroup>
    <thead>
        <tr>
            <th>Logo</th>
            <th>Nome</th>
            <th>Posição</th>
            <th>Checagem</th>
            <th>Editar</th>
            <th>Excluir</th>

        </tr>
    </thead>
    <tbody>
        @foreach($jogadores as $jogador)
        <tr>
            <td>
                @if ($clube->escudo != null)
                <img src="{{ str_replace('public/', 'storage/' ,$clube->escudo) }}" width='100px'></img>
                @endif
            </td>

            <td>{{$jogador->nome}}</td>
            
            <td>@foreach ($clubes as $clube)
                @if($posicao->id == $jogador->posicao_id)
                {{$posicao->descricao}}
                @break
                @endif
                @endforeach
            </td>

            @if($jogador->checagem==false)
            <td>
                <input type="radio" name="checagem" disabled>
            </td>
            @else
            <td><input type="radio" name="{{$jogador->id}}" checked></td>
            @endif


            <td>
                <a href="/jogador/{{$jogador->id}}/edit"><button class="btn btn-warning"><i class="far fa-edit"></i>Editar</button></a>
            </td>

            <td>
                <form action="/jogador/{{$jogador->id}}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE" />
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Deseja Excluir?')"><i class="far fa-trash-alt"></i>Excluir</button>
                </form>
            </td>
            

        </tr>
        @endforeach
    </tbody>
</table>
@endsection