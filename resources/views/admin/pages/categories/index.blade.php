@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <h1>Categorias</h1>
    <button class="btn btn-success text-white">
        <a class="text-white" href="{{ route('categories.create') }}">Cadastrar categoria <i class="fas fa-plus"></i></a>
    </button>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"></a>Dashboard </li>
        <li class="breadcrumb-item active"><a href="{{ route('index') }}"></a>Categorias </li>
    </ol>
@stop

@section('content')

    @include('admin.includes.alerts')

    @if(count($categories) == 0)
        <div class="alert alert-warning">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <p class="text-white font-weight-bold font-italic"><i class="fas fa-exclamation"></i> Até o momento não possui nenhuma categoria cadastrada!</p>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <form action="{{ route('categories.search') }}" method="post" class="form form-inline">
                @csrf

                <input type="text" name="filter" placeholder="Busque pelo filtro" class="form-control" />
                <button type="submit" class="btn btn-secondary ml-2">Filtrar <i class="fas fa-filter"></i> </button>
            </form>
        </div>
        <div class="card-body">
                <table class="table table-bordered text-center">
                    <thead>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </thead>

                    @if(!$categories)
                        <h1>Não tem usuários aqui</h1>
                    @endif

                    @foreach($categories as $category)
                        <tr>
                          <td>{{ $category->name }}</td>
                          <td>{{ $category->description }}</td>
                          <td><a class="btn btn-secondary" href="{{ route('categories.edit', $category->id) }}">Editar <i class="far fa-edit"></i></a>
                              </td>
                        </tr>
                    @endforeach
                </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {{ $categories->appends($filters)->links() }}
            @else
                {{ $categories->links() }}
            @endif
        </div>
    </div>
@stop
