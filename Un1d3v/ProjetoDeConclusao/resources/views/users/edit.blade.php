@extends('layout.template')
@section('main')

    <div class="row">
        <div class="col-md d-flex justify-content-between align-items-center">
            <h1>Cadastro de usuários</h1>
            <a href="{{ route('users.index') }}" class="btn btn-primary">Voltar para a lista de Usuários</a>
        </div>
    </div>

    @include('layout.messages')

    <form action="{{ route('users.update', $user->id) }}" method="post">

        @csrf
        @method('put')
        @include('users.partials.form')

    </form>

@endsection
