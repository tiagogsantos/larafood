@extends('adminlte::page')

@section('title', 'Cadastrar novo Plano')

@section('content_header')
    <h1>Cadastrar novo Plano</h1>
@stop

@section('content')

    @include('admin.includes.alerts')

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('plans.store') }}">
                @csrf

                <div class="form-group">
                    <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Digite o nome do Plano">
                </div>

                <div class="form-group">
                    <input class="form-control" type="text" name="price" value="{{ old('price') }}" placeholder="Digite o preço do Plano">
                </div>

                <div class="form-group">
                     <textarea class="form-control" placeholder="Digite uma breve descrição" name="description" value="{{ old('description') }}"></textarea>
                </div>

                <button class="btn btn-success" type="submit">Criar plano</button>

            </form>
        </div>
    </div>
@endsection
