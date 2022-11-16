@extends('adminlte::page')

@section('title', "Editar Produto {$products->title}")

@section('content_header')
    <h1>Editar o - {{ $products->title }}</h1>
@stop

@section('content')

    @include('admin.includes.alerts')

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('products.update', $products->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Titulo:</label>
                    <input class="form-control" type="text" name="title" value="{{ $products->title }}"
                           placeholder="Digite o do titulo">
                </div>

                <div class="form-group">
                    <label>Preço:</label>
                    <input class="form-control" type="text" name="price" value="{{ $products->price }}"
                           placeholder="R$" autocomplete="off">
                </div>

                <div class="form-group">
                    <label>Descrição:</label>
                    <textarea class="form-control" type="description" name="description"
                              placeholder="Digite a descrição"
                              autocomplete="off"> {{ $products->description }} </textarea>
                </div>

                <div class="form-group">
                    <label>Imagem do produto</label>
                    <div class="row">
                        <div class="col-md-8">
                            <img style="max-width: 350px;" class="img-fluid"
                                 src="{{ url("storage/{$products->image}") }}" alt="{{ $products->title }}">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Se desejar mudar a imagem suba a nova</label>
                    <div class="row">
                        <div class="col-md-8">
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>
                </div>

                <button class="btn btn-success" type="submit">Atualizar Categoria</button>
            </form>

            <form action="{{ route('products.destroy', $products->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger mt-4" type="submit">Excluir Categoria</button>
            </form>
        </div>
    </div>
@endsection
