@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Planos</h1>
    <button class="btn btn-success text-white">
        <a class="text-white" href="{{ route('plans.create') }}">Cadastrar Plano</a>
    </button>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('plans.search') }}" method="post" class="form form-inline">
                @csrf

                <input type="text" name="filter" placeholder="Busque pelo filtro" class="form-control" />
                <button type="submit" class="btn btn-secondary ml-2">Filtrar</button>

            </form>
        </div>
        <div class="card-body">
                <table class="table table-bordered text-center">
                    <thead>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Ações</th>
                    </thead>
                    @foreach($plans as $plan)
                        <tr>
                          <td>{{ $plan->name }}</td>
                          <td>R$ {{ number_format($plan->price, 2, ',', '.')  }}</td>
                          <td><a class="btn btn-warning" href="{{ route('plans.edit', $plan->id) }}">Ver</a></td>
                        </tr>
                    @endforeach
                </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {{ $plans->appends($filters)->links() }}
            @else
                {{ $plans->links() }}
            @endif
        </div>
    </div>
@stop
