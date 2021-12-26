@extends('adminlte::page')

@section('title', 'Atualizar Permissão')

@section('content_header')
    <h1>Atualizar permissão</h1>
@stop

@section('content')

    @include('admin.includes.alerts')

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('permissions.update', $permissions->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <input class="form-control" type="text" name="name" value="{{ $permissions->name ?? old('name') }}" placeholder="Digite seu nome">
                </div>

                <div class="form-group">
                    <textarea class="form-control" placeholder="Digite uma breve descrição" name="description" value="{{ old('description') }}"> {{ $permissions->description }}</textarea>
                </div>

                <button class="btn btn-success" type="submit">Atualizar permissão</button>
            </form>

            <form action="{{ route('permissions.destroy', $permissions->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger mt-4" type="submit">Excluir permissão</button>
            </form>

        </div>
    </div>
@endsection
