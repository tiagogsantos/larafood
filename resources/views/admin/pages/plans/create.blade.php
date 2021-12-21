@extends('adminlte::page')

@section('title', 'Cadastrar novo Plano')

@section('content_header')
    <h1>Cadastrar novo Plano</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('plans.store') }}">
                @csrf

                <div class="form-group">
                    <input class="form-control" type="text" name="name" placeholder="Digite seu nome">
                </div>

                <div class="form-group">
                    <input class="form-control" type="text" name="price" placeholder="Digite o preço do curso">
                </div>

                <div class="form-group">
                     <textarea class="form-control" placeholder="Digite uma breve descrição" name="description"></textarea>
                </div>

                <button class="btn btn-success" type="submit">Criar plano</button>

            </form>
        </div>
    </div>
@endsection
