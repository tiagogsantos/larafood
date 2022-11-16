@extends('adminlte::page')

@section('title', 'Editar Categoria {$category->name}')

@section('content_header')
    <h1>Editar o - {{ $category->name }}</h1>
@stop

@section('content')

    @include('admin.includes.alerts')

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('categories.update', $category->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <input class="form-control" type="text" name="name" value="{{ $category->name }}"
                           placeholder="Digite o nome da categoria">
                </div>

                <div class="input-group mb-3">
                    <textarea class="form-control"> {{ $category->description }}</textarea>
                </div>

                <button class="btn btn-success" type="submit">Atualizar Categoria</button>
            </form>

            <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger mt-4" type="submit">Excluir Categoria</button>
            </form>
        </div>
    </div>
@endsection
