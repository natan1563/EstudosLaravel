@extends('template.principal')
@section('titulo', 'Clientes')
@section('conteudo')
<h3>{{$titulo}}</h3>
<a href="{{route('clientes.create')}}">Novo Cliente</a>

@if(count($clientes)>0)

<ul>
    @foreach (session('clientes') as $c)
        <li>{{$c['id']}} | {{$c['nome']}} | 
            <a href="{{route('clientes.edit', $c['id'])}}">Editar</a>
            <a href="{{route('clientes.show', $c['id'])}}">Info</a>
            <form action="{{route('clientes.destroy', $c['id'])}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" value="Apagar">
            </form>
        </li>
    @endforeach
</ul>

<hr>

@foreach ($clientes as $c)
    <p>
        {{$c['nome']}} | 
        @if($loop->first)
            (primeiro) | 
        @endif

        @if($loop->last)
            (Ultimo) | 
        @endif

        ({{$loop->index}}) - {{$loop->iteration}} / {{$loop->count}}
        
    </p>
@endforeach

@else
    <h4>Não existem clientes cadastrados</h4>
@endif

@empty($clientes)
    <h4>Não existem clientes cadastrados</h4>
@endempty
@endsection