@extends('adminlte::page')

@section('title', 'Cadastrar novo Usuário')

@section('content_header')
    <h1>Cadastrar novo Usuário</h1>
@stop

@section('content')

    @include('admin.includes.alerts')

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('users.store') }}">
                @csrf

                <div class="form-group">
                    <input class="form-control" type="text" name="name" value="{{ old('name') }}"
                           placeholder="Digite o nome do usuario">
                </div>

                <div class="form-group">
                    <input class="form-control" type="email" name="email" value="{{ old('email') }}"
                           placeholder="Digite o E-mail">
                </div>

                <button class="btn btn-success" type="submit">Criar usuário</button>

            </form>
        </div>
    </div>
@endsection
