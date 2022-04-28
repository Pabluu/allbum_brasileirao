@extends("templates.main")
@section("titulo_aba", "Cadastro de Posições")

@section("formulario")
<form action="/posicao" method="post" class='row'>
    <div class="form-group col-10">
        <label class='' for="">Descrição</label>
        <input type="text" class='form-control'>
    </div>

    <div class="form-group col-2">
        @csrf
        <input type="hidden" id='id' name='id' value='{{$pos->id'}}>
        <button submit='submit' class='btn btn-success' style='margin-top: 23px;'>
            <i class='bi bi-save'></i> Salvar
        </button>
    </div>

</form>
@endsection

@section('tabela_posicao')
<h1>Tabela de Posições de Jogadores</h1>

<table class="table table-striped">
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
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tbody>

</table>
@endsection