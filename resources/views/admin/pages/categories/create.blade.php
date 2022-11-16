@extends('adminlte::page')

@section('title', 'Cadastrar nova Categoria')

@section('content_header')
    <h1>Cadastrar nova Categoria</h1>
@stop

@section('content')

    @include('admin.includes.alerts')

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('categories.store') }}">
                @csrf

                <div class="form-group">
                    <input class="form-control" type="text" name="name" value="{{ old('name') }}"
                           placeholder="Digite o nome da categoria" autocomplete="off">
                </div>

                <div class="form-group">
                    <textarea class="form-control" type="description" name="description" value="{{ old('description') }}"
                              placeholder="Digite a descrição" autocomplete="off"> </textarea>
                </div>

                <button class="btn btn-success" type="submit">Criar categoria</button>

            </form>
        </div>
    </div>
@endsection
