@extends('layout.template')
@section('main')

    <div class="row">
        <div class="col-md d-flex justify-content-between align-items-center">
            <h1>Cadastro de fornecedores</h1>
            <a href="{{ route('providers.index') }}" class="btn btn-primary">Voltar para a lista de Usuários</a>
        </div>
    </div>

    @include('layout.messages')

    <form action="{{ route('providers.store') }}" method="post">

        @csrf

        @include('providers.partials.form')

    </form>

@endsection
