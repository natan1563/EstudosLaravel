@extends('template.principal')

@section('titulo', 'Opções')
    @section('conteudo')
        
    
    <div class="options">
        <ul>
            <li><a class="warning {{ request()->route('opcao') == 1 ? 'selected' : ''}}"  href="{{ route('opcao', 1)}}">Warning</a></li>
            <li><a class="info {{ request()->route('opcao') == 2 ? 'selected' : ''}}"     href="{{ route('opcao', 2)}}">Info</a></li>
            <li><a class="success {{ request()->route('opcao') == 3 ? 'selected' : ''}}"  href="{{ route('opcao', 3)}}">Success</a></li>
            <li><a class="error {{ request()->route('opcao') == 4 ? 'selected' : ''}}"    href="{{ route('opcao', 4)}}">Error</a></li>
        </ul>
    </div>
    
    @if(isset($opcao))

    @switch($opcao)
        @case(1)
            <x-alerta titulo='Erro Fatal' tipo='warning'>
             <p><strong>Erro inesperado</strong></p>
             <p>Ocorreu um erro inesperado</p>
            </x-alerta>
            @break
        @case(2)
            <x-alerta titulo='Erro Fatal' tipo='info'>
             <p><strong>Erro inesperado</strong></p>
             <p>Ocorreu um erro inesperado</p>
            </x-alerta>
            @break
        @case(3)
            <x-alerta titulo='Erro Fatal' tipo='success'>
             <p><strong>Erro inesperado</strong></p>
             <p>Ocorreu um erro inesperado</p>
            </x-alerta>
            @break
        @case(4)
            <x-alerta titulo='Erro Fatal' tipo='error'>
             <p><strong>Erro inesperado</strong></p>
             <p>Ocorreu um erro inesperado</p>
            </x-alerta>
            @break
        @default
            
    @endswitch
    
    @endif
    
    @endsection

       
        
        
        
        
        
        