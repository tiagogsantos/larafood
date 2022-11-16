@extends('adminlte::page')

@section('title', "Categorias do produto {$categories->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('profiles.index') }}" class="active">Perfis</a></li>
    </ol>

    <h1>Categorias do Produto<strong> {{ $categories->name }}</strong></h1>

@stop

@section('content')

    @include('admin.includes.alerts')

    @if(count($product) == 0)
        <div class="alert alert-warning">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <p class="text-white font-weight-bold font-italic"><i class="fas fa-exclamation"></i> Até o momento não possui categorias cadastraddas a um produto {{ $product->title }} !</p>
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
                @foreach ($product as $prod)
                    <tr>
                        <td>
                            {{ $prod->name }}
                        </td>
                        <td style="width=10px;">
                            <a href="{{ route('product.categories.detach', [$profile->id, $permission->id]) }}" class="btn btn-danger">DESVINCULAR</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $product->appends($filters)->links() !!}
            @else
                {!! $product->links() !!}
            @endif
        </div>
    </div>
@stop
