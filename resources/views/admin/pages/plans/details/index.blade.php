@extends('adminlte::page')

@section('title', "Detalhes do Plano {$plan->name}")

@section('content_header')
    <h1>Detalhes do {{ $plan->name }}</h1>
    <button class="btn btn-success text-white">
        <a class="text-white" href="{{ route('details.plan.create', $plan->url) }}">Cadastrar novo detalhe <i class="fas fa-plus"></i></a>
    </button>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a> </li>
        <li class="breadcrumb-item active"><a href="{{ route('index') }}">Planos </a></li>
        <li class="breadcrumb-item active"><a href="{{ route('details.plan.index', $plan->url) }}">{{ $plan->name }} </a></li>
    </ol>
@stop

@section('content')

    @include('admin.includes.alerts')

    @if(count($details) == 0)
        <div class="alert alert-warning">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <p class="text-white font-weight-bold font-italic"><i class="fas fa-exclamation"></i> Até o momento não possui detalhes cadastrados!</p>
        </div>
    @endif


    <div class="card">
        <div class="card-header">
            <form action="{{ route('plans.search') }}" method="post" class="form form-inline">
                @csrf

                <input type="text" name="filter" placeholder="Busque pelo filtro" class="form-control" />
                <button type="submit" class="btn btn-secondary ml-2">Filtrar <i class="fas fa-filter"></i> </button>

            </form>
        </div>
        <div class="card-body">

            <table class="table table-bordered text-center">
                <thead>
                <th>Nome</th>
                <th>Ações</th>
                </thead>
                @foreach($details as $detail)
                    <tr>
                        <td>{{ $detail->name }}</td>
                        <td><a class="btn btn-warning" href="{{ route('details.plan.edit', [$plan->url, $detail->id]) }}">Ver <i class="far fa-edit"></i></a></td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {{ $details->appends($filters)->links() }}
            @else
                {{ $details->links() }}
            @endif
        </div>
    </div>
@stop
