@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
    <h1>Permissões</h1>
    <button class="btn btn-success text-white">
        <a class="text-white" href="{{ route('permissions.create') }}">Cadastrar Permissão <i class="fas fa-plus"></i></a>
    </button>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Dashboard</a> </li>
        <li class="breadcrumb-item active"><a href="#">Perfil </a></li>
        <li class="breadcrumb-item active"><a href="#">Perfil </a></li>
    </ol>
@stop

@section('content')
    @include('admin.includes.alerts')

    @if(count($permissions) == 0)
        <div class="alert alert-warning">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <p class="text-white font-weight-bold font-italic"><i class="fas fa-exclamation"></i> Até o momento não possui detalhes cadastrados!</p>
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
                @foreach($permissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->description }}</td>
                        <td><a class="btn btn-secondary" href="{{ route('permissions.edit', $permission->id) }}">Ver <i class="far fa-edit"></i></a>
                        <a class="btn btn-info" href="{{ route('permissions.profiles', $permission->id) }}">Ver Perfis <i class="far fa-address-book"></i></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@stop
