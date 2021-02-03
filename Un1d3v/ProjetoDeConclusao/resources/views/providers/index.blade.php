@extends('layout.template')
@section('main')
@include('providers.partials.search')

<div class="row">
    <div class="col-md d-flex justify-content-between align-items-center">
        <h1>Listagem de Fornecedores</h1>
        <a href="{{ route('providers.create') }}" class="btn btn-success btn-unidev">Cadastrar novo</a>
    </div>
</div>

@include('layout.messages')

<div class="table-responsive">
    <table class="table table-striped mt-5">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome do fornecedor</th>
            <th scope="col">E-mail</th>
            <th scope="col">Contato</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>

        @foreach($providers as $provider)
        <tr>
            <td>{{ $provider->id }}</td>
            <td>{{ $provider->name }}</td>
            <td>{{ $provider->email }}</td>
            <td>{{ $provider->phone }}</td>
            <td>
                <a class="btn btn-primary btn-sm" href="{{ route('providers.edit', $provider->id) }}">Editar</a>
                <a class="btn btn-danger btn-sm" onclick="deleteInDatabase('{{ route('providers.destroy', $provider->id) }}')">Excluir</a>
            </td>
        </tr>
         @endforeach
        </tbody>
    </table>
</div>

<div class="mt-5">
    {{ $providers->appends([
        'action' => request('action'),
        'keyword' => request('keyword'),
        'email' => request('price_from'),
        'phone' => request('phone'),
        'order_by' => request('order_by')
    ])->links() }}
</div>

@endsection
