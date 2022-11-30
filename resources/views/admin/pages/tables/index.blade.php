@extends('adminlte::page')

@section('title', 'Mesas')

@section('content_header')
    <h1>Mesas</h1>
    <button class="btn btn-success text-white">
        <a class="text-white" href="{{ route('tables.create') }}">Cadastrar mesas <i class="fas fa-plus"></i></a>
    </button>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"></a>Dashboard </li>
        <li class="breadcrumb-item active"><a href="{{ route('index') }}"></a>Mesas </li>
    </ol>
@stop

@section('content')

    @include('admin.includes.alerts')

    @if(count($tables) == 0)
        <div class="alert alert-warning">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <p class="text-white font-weight-bold font-italic"><i class="fas fa-exclamation"></i> Até o momento não possui nenhuma mesa cadastrada!</p>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <form action="{{ route('tables.search') }}" method="post" class="form form-inline">
                @csrf

                <input type="text" name="filter" placeholder="Busque pelo filtro" class="form-control" />
                <button type="submit" class="btn btn-secondary ml-2">Filtrar <i class="fas fa-filter"></i> </button>
            </form>
        </div>
        <div class="card-body">
                <table class="table table-bordered text-center">
                    <thead>
                        <th>Nome</th>
                        <th>Quantidade de Pessoas</th>
                        <th>Ações</th>
                    </thead>

                    @if(!$tables)
                        <h1>Não tem usuários aqui</h1>
                    @endif

                    @foreach($tables as $table)
                        <tr>
                          <td>{{ $table->name }}</td>
                          <td>{{ $table->peoples }}</td>
                          <td><a class="btn btn-secondary" href="{{ route('tables.edit', $table->id) }}">Editar <i class="far fa-edit"></i></a>
                              </td>
                        </tr>
                    @endforeach
                </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {{ $tables->appends($filters)->links() }}
            @else
                {{ $tables->links() }}
            @endif
        </div>
    </div>
@stop
