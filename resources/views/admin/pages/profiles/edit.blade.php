@extends('adminlte::page')

@section('title', 'Atualizar novo Perfil')

@section('content_header')
    <h1>Atualizar novo perfil</h1>
@stop

@section('content')

    @include('admin.includes.alerts')

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('profiles.update', $profiles->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <input class="form-control" type="text" name="name" value="{{ $profiles->name ?? old('name') }}" placeholder="Digite seu nome">
                </div>

                <div class="form-group">
                    <textarea class="form-control" placeholder="Digite uma breve descrição" name="description" value="{{ old('description') }}"> {{ $profiles->description }}</textarea>
                </div>

                <button class="btn btn-success" type="submit">Atualizar perfil</button>

            </form>
        </div>
    </div>
@endsection
