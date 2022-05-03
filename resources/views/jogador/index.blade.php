@extends("templates.main")
@section("titulo_aba", 'Cadastro de Jogadores')

@section('formulario')
<form action="/jogador" class='row' method='POST' enctype='multipart/form-data'>
    <div class='form-group col-5'>
        <label for="nome">Nome do Jogador</label>
        <input type="text" name='nome' @class([ "form-control" , "is-invalid"=> ($errors->first("nome") != "")])
        value='{{$jogador->nome}}'
        />

        <div class="invalid-feedback">
            {{ $errors->first("nome") }}
        </div>
    </div>

    <div class='form-group col-5'>
        <label for="dataNasc">Data de Nascimento</label>
        <input type="file" id='dataNasc' name='dataNasc' @class([ "form-control" , "is-invalid"=> ($errors->first("dataNasc") != "")])>

        <div class="invalid-feedback">
            {{ $errors->first("dataNasc") }}
        </div>
    </div>


    <div class='form-group col-5 flex-column'>
        <label for="clbAtual">Clube Atual</label>
        <select>
            <option value="">-----</option>
            @foreach($clubes as $clube)
            <option value="{{$clube->nome}}"></option>
            @endforeach
        </select>

        <div class="invalid-feedback">
            {{ $errors->first("clbAtual") }}
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
@endsection