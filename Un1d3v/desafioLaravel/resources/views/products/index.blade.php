@extends('layout.template')
@section('main')
    <h1>Listando os Produtos</h1>

    <table class="table table-success table-striped mt-5">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome do Produto</th>
                <th scope="col">Preço</th>
                <th scope="col">Fabricante</th>
                <th scope="col">Validade</th>
                <th scope="col">Fabricação</th>
                <th scope="col"></th>
            </tr>
        </thead>

        <tbody>
        @foreach($products as $product)
            <tr>
                <td scope="col">{{$product->id}}</td>
                <td scope="col">{{$product->name}}</td>
                <td scope="col">{{$product->price_formated}}</td>
                <td scope="col">{{$product->provider}}</td>
                <td scope="col">{{$product->expiration_date->format('d/m/Y')}}</td>
                <td scope="col">{{$product->manufacturing_date->format('d/m/Y')}}</td>
                <td scope="col"></td>
            </tr>
        @endforeach
        </tbody>

    </table>

    <div class="mt-5">
        {{$products->links()}}
    </div>
@endsection
