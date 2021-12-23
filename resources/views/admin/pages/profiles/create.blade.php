@extends('adminlte::page')

@section('title', 'Cadastrar novo Perfil')

@section('content_header')
    <h1>Cadastrar novo perfil</h1>
@stop

@section('content')

    @include('admin.includes.alerts')

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('profiles.store') }}">
                @csrf

                <div class="form-group">
                    <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Digite seu nome">
                </div>

                <div class="form-group">
                    <textarea class="form-control" placeholder="Digite uma breve descrição" name="description" value="{{ old('description') }}"></textarea>
                </div>

                <button class="btn btn-success" type="submit">Criar perfil</button>

            </form>
        </div>
    </div>
@endsection
