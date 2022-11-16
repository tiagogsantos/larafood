@extends('adminlte::page')

@section('title', 'Produtos')

@section('content_header')
    <h1>Produtos</h1>
    <button class="btn btn-success text-white">
        <a class="text-white" href="{{ route('products.create') }}">Cadastrar produto <i class="fas fa-plus"></i></a>
    </button>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"></a>Dashboard</li>
        <li class="breadcrumb-item active"><a href="{{ route('index') }}"></a>Categorias</li>
    </ol>
@stop

@section('content')

    @include('admin.includes.alerts')

    @if(count($products) == 0)
        <div class="alert alert-warning">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <p class="text-white font-weight-bold font-italic"><i class="fas fa-exclamation"></i> Até o momento não
                possui nenhum produto cadastrado!</p>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <form action="{{ route('products.search') }}" method="post" class="form form-inline">
                @csrf

                <input type="text" name="filter" placeholder="Busque pelo filtro" class="form-control"/>
                <button type="submit" class="btn btn-secondary ml-2">Filtrar <i class="fas fa-filter"></i></button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-bordered text-center">
                <thead>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Imagem</th>
                <th>Ações</th>
                </thead>

                @if(!$products)
                    <h1>Não tem produtos aqui</h1>
                @endif

                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->description }}</td>
                        <td><img style="max-width: 150px;" class="img-fluid" src="{{ url("storage/{$product->image}") }}" alt="{{ $product->title }}"></td>
                        <td><a class="btn btn-secondary" href="{{ route('products.edit', $product->id) }}">Editar produto
                                <i class="far fa-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {{ $products->appends($filters)->links() }}
            @else
                {{ $products->links() }}
            @endif
        </div>
    </div>
@stop
