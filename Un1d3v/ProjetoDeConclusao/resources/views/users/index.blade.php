@extends('layout.template')
@section('main')
@include('users.partials.search')

<div class="row">
    <div class="col-md d-flex justify-content-between align-items-center">
        <h1>Listagem de Usuários</h1>
        <a href="{{ route('users.create') }}" class="btn btn-success btn-unidev">Cadastrar novo</a>
    </div>
</div>

@include('layout.messages')

<div class="table-responsive">
    <table class="table table-striped mt-5">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome do usuario</th>
            <th scope="col">Email</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>

        @foreach($allUsers as $user)

        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a class="btn btn-primary btn-sm" href="{{ route('users.edit', $user->id) }}">Editar</a>
                <a class="btn btn-danger btn-sm" onclick="deleteInDatabase('{{ route('users.destroy', $user->id) }}')">Excluir</a>
            </td>
        </tr>
         @endforeach
        </tbody>
    </table>
</div>

<div class="mt-5">
    {{ $allUsers->appends([
        'action' => request('action'),
        'keyword' => request('keyword'),
        'email' => request('price_from'),
        'order_by' => request('order_by')
    ])->links() }}
</div>

@endsection
