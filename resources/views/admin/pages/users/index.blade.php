@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <h1>Usuários</h1>
    <button class="btn btn-success text-white">
        <a class="text-white" href="{{ route('plans.create') }}">Cadastrar Usuário <i class="fas fa-plus"></i></a>
    </button>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"></a>Dashboard </li>
        <li class="breadcrumb-item active"><a href="{{ route('index') }}"></a>Usuários </li>
    </ol>
@stop

@section('content')

    @include('admin.includes.alerts')

    @if(count($users) == 0)
        <div class="alert alert-warning">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <p class="text-white font-weight-bold font-italic"><i class="fas fa-exclamation"></i> Até o momento não possui nenhum usuário cadastrados!</p>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <form action="{{ route('users.search') }}" method="post" class="form form-inline">
                @csrf

                <input type="text" name="filter" placeholder="Busque pelo filtro" class="form-control" />
                <button type="submit" class="btn btn-secondary ml-2">Filtrar <i class="fas fa-filter"></i> </button>

            </form>
        </div>
        <div class="card-body">
                <table class="table table-bordered text-center">
                    <thead>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Ações</th>
                    </thead>

                    @if(!$users)
                        <h1>Não tem usuários aqui</h1>
                    @endif

                    @foreach($users as $user)
                        <tr>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td><a class="btn btn-secondary" href="{{ route('users.edit', $user->id) }}">Editar <i class="far fa-edit"></i></a>
                              </td>
                        </tr>
                    @endforeach
                </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {{ $users->appends($filters)->links() }}
            @else
                {{ $users->links() }}
            @endif
        </div>
    </div>
@stop
