@extends('adminlte::page')

@section('title', "Editar Mesa {$table->name}")

@section('content_header')
    <h1>Editar o - {{ $table->name }}</h1>
@stop

@section('content')

    @include('admin.includes.alerts')

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('tables.update', $table->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Numero da Mesa</label>
                    <input class="form-control" type="text" name="name" value="{{ $table->name }}"
                           placeholder="Digite o nome da categoria" autocomplete="off">
                </div>

                <div class="form-group">
                    <label>Quantidade de pessoas</label>
                    <input type="number" class="form-control" name="peoples" value="{{ $table->peoples }}"
                           placeholder="Digite a quantidade de pessoas" autocomplete="off">
                </div>

                <button class="btn btn-success" type="submit">Atualizar mesa</button>
            </form>

            <form action="{{ route('tables.destroy', $table->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger mt-4" type="submit">Excluir Mesa</button>
            </form>
        </div>
    </div>
@endsection
