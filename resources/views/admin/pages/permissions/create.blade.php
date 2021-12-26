@extends('adminlte::page')

@section('title', 'Cadastrar nova permissão')

@section('content_header')
    <h1>Cadastrar nova permissão</h1>
@stop

@section('content')

    @include('admin.includes.alerts')

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('permissions.store') }}">
                @csrf

                <div class="form-group">
                    <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Digite o nome da permissão">
                </div>

                <div class="form-group">
                    <textarea class="form-control" placeholder="Digite uma breve descrição" name="description" value="{{ old('description') }}"></textarea>
                </div>

                <button class="btn btn-success" type="submit">Criar permissão</button>

            </form>
        </div>
    </div>
@endsection
