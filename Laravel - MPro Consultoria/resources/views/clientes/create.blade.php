@extends('template.principal')
@section('titulo', 'Novo Cliente')

@section('conteudo')
    <h3>Novo Cliente</h3>

    <form action="{{route('clientes.store')}}" method="post">
        @csrf
        <input type="text" name="nome">
        <input type="submit" value="Salvar">
    </form>
@endsection

