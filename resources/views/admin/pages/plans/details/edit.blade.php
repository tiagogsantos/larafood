@extends('adminlte::page')

@section('title', 'Cadastrar novo Detalhe ao plano')

@section('content_header')
    <h1>Editar detalhe ao {{ $plan->name }}</h1>
@stop

@section('content')

    @include('admin.includes.alerts')

    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('details.plan.update', [$plan->url, $detail->id]) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <input class="form-control" type="text" name="name" value="{{ $detail->name ?? old('name') }}" placeholder="Digite seu nome">
                </div>

                <button class="btn btn-success" type="submit">Atualizar detalhe</button>
            </form>

            <form method="post" action="{{ route('details.plan.destroy', [$plan->url, $detail->id]) }}">
                @csrf
                @method('DELETE')

                <button class="btn btn-danger mt-4" type="submit">Excluir detalhe</button>

            </form>

        </div>
    </div>
@endsection
