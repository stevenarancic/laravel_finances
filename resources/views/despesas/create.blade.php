@extends('base')
@section('title', 'Cadastro de Despesa')
@section('content')
    <form action="/despesas" method="post">
        @csrf
        <div class="field">
            <label class="label">Nome</label>
            <div class="control">
                <input name="nome" class="input" type="text" placeholder="">
            </div>
        </div>

        <div class="field">
            <label for="valor" class="label">Valor</label>
            <div class="control">
                <input type="tel" name="valor" id="valor" class="input">
            </div>
        </div>

        <div class="field">
            <label for="valor" class="label">Data de Vencimento</label>
            <div class="control">
                <input type="date" name="vencimento" id="vencimento" class="input">
            </div>
        </div>

        <button type="submit" class="button is-primary is-fullwidth">Cadastrar</button>
    </form>
@endsection
