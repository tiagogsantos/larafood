@extends('adminlte::page')

@section('title', 'Perfil')

@section('content_header')
    <h1>Perfil</h1>
    <button class="btn btn-success text-white">
        <a class="text-white" href="{{ route('profiles.create') }}">Cadastrar Perfil <i class="fas fa-plus"></i></a>
    </button>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a> </li>
        <li class="breadcrumb-item active"><a href="{{ route('profiles.index') }}">Perfil </a></li>
    </ol>
@stop

@section('content')
    @include('admin.includes.alerts')

    @if(count($profiles) == 0)
        <div class="alert alert-warning">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <p class="text-white font-weight-bold font-italic"><i class="fas fa-exclamation"></i> Até o momento não possui planos cadastrados!</p>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <form action="#" method="post" class="form form-inline">
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
                @foreach($profiles as $profile)
                    <tr>
                        <td>{{ $profile->name }}</td>
                        <td>{{ $profile->description }}</td>
                        <td><a class="btn btn-secondary" href="{{ route('profiles.edit', $profile->id) }}">Ver <i class="far fa-edit"></i></a>
                            <a href="{{ route('profiles.permissions', $profile->id) }}" class="btn btn-warning"><i class="fas fa-lock"></i></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
      <!-- <div class="card-footer">
            @if(isset($filters))
                {{ $profiles->appends($filters)->links() }}
            @else
                {{ $profiles->links() }}
            @endif
        </div> -->
    </div>
@stop
