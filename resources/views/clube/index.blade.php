@extends("templates.main")
@section("titulo_aba", 'Cadastro de Clubes')

@section('formulario')
<form action="/clube" class='row' method='POST' enctype='multipart/form-data'>
    <div class='form-group col-5'>
        <label for="nome">Nome do Clube</label>
        <input type="text" name='nome' @class([ "form-control" , "is-invalid"=> ($errors->first("nome") != "")])
        value='{{$clube->nome}}'
        />

        <div class="invalid-feedback">
            {{ $errors->first("nome") }}
        </div>
    </div>

    <div class='form-group col-5'>
        <label for="escudo" class="escudo">Escudo do Clube</label>
        <input type="file" id='escudo' name='escudo' @class([ "form-control" , "is-invalid"=> ($errors->first("escudo") != "")])>

        <div class="invalid-feedback">
            {{ $errors->first("escudo") }}
        </div>
    </div>

    <div class="form-group col-2">
        @csrf
        <input type="hidden" id="id" name="id" value="{{ $clube->id }}" />
        <button type="submit" class="btn btn-sm btn-success" style="margin-top: 29px;">
            <i class="bi bi-save"></i> Salvar
        </button>
    </div>
</form>
@endsection

@section("tabela")
<br />
<h1>Lista de Clubes</h1>
<table class="table table-striped table-hover">
    <colgroup>
        <col width="400">
        <col width="200">
        <col width="100">
        <col width="100">
    </colgroup>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Foto</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($clubes as $clube)
        <tr>
            <td>{{ $clube->nome }}</td>
            <td>
                @if ($clube->escudo != null)
                <img src="{{ str_replace('public/', 'storage/' ,$clube->escudo) }}" width='100px'></img>
                @endif
            </td>

            <td>
                <a href="/clube/{{ $clube->id }}/edit" class="btn btn-warning">
                    <i class="bi bi-pencil-square"></i> Editar
                </a>
            </td>
            <td>
                <form method="POST" action="/clube/{{ $clube->id }}">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE" />
                    <button type="button" class="btn btn-danger">
                        <i class="bi bi-trash"></i> Excluir
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection