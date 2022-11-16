@extends('adminlte::page')

@section('title', 'Cadastrar nova Categoria')

@section('content_header')
    <h1>Cadastrar novo Produto</h1>
@stop

@section('content')

    @include('admin.includes.alerts')

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Titulo:</label>
                    <input class="form-control" type="text" name="title" value="{{ old('title') }}"
                           placeholder="Digite o nome da categoria" autocomplete="off">
                </div>

                <div class="form-group">
                    <label>Preço:</label>
                    <input class="form-control" type="text" name="price" value="{{ old('price') }}"
                           placeholder="R$" autocomplete="off">
                </div>

                <div class="form-group">
                    <label>Descrição:</label>
                    <textarea class="form-control" type="description" name="description" value="{{ old('description') }}"
                              placeholder="Digite a descrição" autocomplete="off"> </textarea>
                </div>

                <div class="form-group">
                    <label>Imagem do produto:</label>:
                    <input type="file" name="image" class="form-control">
                </div>

                <button class="btn btn-success" type="submit">Criar produto</button>

            </form>
        </div>
    </div>
@endsection
