@extends('adminlte::page')

@section('title', 'Cadastrar novo Plano')

@section('content_header')
    <h1>Edotar Plano {{ $plans->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('plans.update', $plans->id) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <input class="form-control" type="text" name="name" value="{{ $plans->name }}"
                           placeholder="Digite seu nome">
                </div>

                <div class="form-group">
                    <input class="form-control" type="text" name="price"
                           value="R$ {{ number_format($plans->price, 2, ',', '.') }}"
                           placeholder="Digite o preço do curso">
                </div>

                <div class="form-group">
                    <textarea class="form-control" placeholder="Digite uma breve descrição"
                              name="description"> {{ $plans->description }}</textarea>
                </div>
                <button class="btn btn-success" type="submit">Atualizar plano</button>
            </form>

            <form action="{{ route('plans.destroy', $plans->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger mt-4" type="submit">Excluir plano</button>
            </form>
        </div>
    </div>
@endsection
