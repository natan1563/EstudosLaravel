@extends('layout.template')
@section('main')

    <div class="row">
        <div class="col-md d-flex justify-content-between align-items-center">
            <h1>Atualização de fornecedores</h1>
            <a href="{{ route('providers.index') }}" class="btn btn-primary">Voltar para a listagem</a>
        </div>
    </div>

    @include('layout.messages')

    <form action="{{ route('providers.update', $provider->id) }}" method="post">

        @csrf
        @method('put')

        @include('providers.partials.form')

    </form>

@endsection
