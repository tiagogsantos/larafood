@extends('adminlte::page')

@section('title', "Categorias do produto {$product->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('products.index') }}" class="active">Perfis</a></li>
    </ol>

    <h1>Categorias do Produto <strong>{{ $product->name }}</strong></h1>

    <a href="{{ route('product.categories.available', $product->id) }}" class="btn btn-dark">Adicionar permissão</a>
@stop

@section('content')

    @include('admin.includes.alerts')

    @if(count($categories) == 0)
        <div class="alert alert-warning">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <p class="text-white font-weight-bold font-italic"><i class="fas fa-exclamation"></i> Até o momento não
                possui nenhuma categoria cadastrada para {{ $product->title }} !</p>
        </div>
    @endif


    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th width="50">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>
                            {{ $category->name }}
                        </td>
                        <td style="width=10px;">
                            <a href="{{ route('product.categories.detach', [$product->id, $category->id]) }}"
                               class="btn btn-danger">DESVINCULAR</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $categories->appends($filters)->links() !!}
            @else
                {!! $categories->links() !!}
            @endif
        </div>
    </div>
@stop
