@extends('base')
@section('title', 'Edição de Despesa');
@section('content')
    <form action="/despesas/{{ $despesa->id }}" method="post">
        @csrf
        @method('PUT')
        <div class="field">
            <label class="label">Nome</label>
            <div class="control">
                <input name="nome" class="input" type="text" value="{{ $despesa->nome }}">
            </div>
        </div>

        <div class="field">
            <label for="valor" class="label">Valor</label>
            <div class="control">
                <input type="tel" name="valor" id="valor" class="input" value={{ $despesa->valor }}>
            </div>
        </div>

        <div class="field">
            <label for="valor" class="label">Data de Vencimento</label>
            <div class="control">
                <input type="date" name="vencimento" id="vencimento" class="input" value={{ $despesa->vencimento }}>
            </div>
        </div>

        <button type="submit" class="button is-primary is-fullwidth">Atualizar</button>
    </form>
@endsection
