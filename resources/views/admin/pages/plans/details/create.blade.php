@extends('adminlte::page')

@section('title', 'Cadastrar novo Detalhe ao plano')

@section('content_header')
    <h1>Cadastrar novo Detalhe ao {{ $plan->name }}</h1>
@stop

@section('content')

    @include('admin.includes.alerts')

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('details.plan.store', $plan->url) }}">
                @csrf

                <div class="form-group">
                    <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Digite seu nome">
                </div>

                <button class="btn btn-success" type="submit">Criar detalhe</button>

            </form>
        </div>
    </div>
@endsection
