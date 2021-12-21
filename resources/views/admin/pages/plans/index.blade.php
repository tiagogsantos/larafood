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
            #filtros
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
                          <td>{{ $plan->price }}</td>
                          <td><button class="btn btn-warning">Ver<a href="#"></a></button></td>
                        </tr>
                    @endforeach
                </table>
        </div>
        <div class="card-footer">
            {{ $plans->links() }}
        </div>
    </div>
@stop
