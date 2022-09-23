@extends('base')
@section('title', 'Dados da Despesa')
@section('content')
    {{ $despesa->nome }}
    R$ {{ number_format($despesa->valor, 2) }}
    {{ $despesa->vencimento }}
@endsection
