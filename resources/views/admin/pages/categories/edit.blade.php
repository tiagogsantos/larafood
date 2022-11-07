@extends('adminlte::page')

@section('title', 'Editar usuário {$user->name}')

@section('content_header')
    <h1>Editar o - {{ $users->name }}</h1>
@stop

@section('content')

    @include('admin.includes.alerts')

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('users.update', $users->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <input class="form-control" type="text" name="name" value="{{ $users->name }}"
                           placeholder="Digite seu nome">
                </div>

                <div class="input-group mb-3">
                    <input class="form-control" type="text" name="email"
                           value="{{ $users->email }}"
                           placeholder="Digite o preço do curso">
                </div>

                <button class="btn btn-success" type="submit">Atualizar Usuário</button>
            </form>

            <form action="{{ route('users.destroy', $users->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger mt-4" type="submit">Excluir Usuário</button>
            </form>
        </div>
    </div>
@endsection
