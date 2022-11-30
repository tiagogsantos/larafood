@extends('adminlte::page')

@section('title', 'Cadastrar nova Categoria')

@section('content_header')
    <h1>Cadastrar nova Categoria</h1>
@stop

@section('content')

    @include('admin.includes.alerts')

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('tables.store') }}">
                @csrf

                <div class="form-group">
                    <label>Numero da Mesa</label>
                    <input class="form-control" type="text" name="name" value="{{ old('name') }}"
                           placeholder="Digite o nome da categoria" autocomplete="off">
                </div>

                <div class="form-group">
                    <label>Quantidade de pessoas</label>
                    <input type="number" class="form-control" name="peoples" value="{{ old('peoples') }}"
                           placeholder="Digite a quantidade de pessoas" autocomplete="off">
                </div>

                <button class="btn btn-success" type="submit">Criar mesa</button>

            </form>
        </div>
    </div>
@endsection
