@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Planos</h1>
    <button class="btn btn-success text-white">
        <a class="text-white" href="{{ route('plans.create') }}">Cadastrar Plano <i class="fas fa-plus"></i></a>
    </button>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"></a>Dashboard </li>
        <li class="breadcrumb-item active"><a href="{{ route('index') }}"></a>Planos </li>
    </ol>
@stop

@section('content')

    @include('admin.includes.alerts')

    @if(count($plans) == 0)
        <div class="alert alert-warning">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <p class="text-white font-weight-bold font-italic"><i class="fas fa-exclamation"></i> Até o momento não possui planos cadastrados!</p>
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
                        <th>Preço</th>
                        <th>Ações</th>
                    </thead>

                    @if(!$plans)
                        <h1>Não tem planos aqui</h1>
                    @endif

                    @foreach($plans as $plan)
                        <tr>
                          <td>{{ $plan->name }}</td>
                          <td>R$ {{ number_format($plan->price, 2, ',', '.')  }}</td>
                          <td><a class="btn btn-secondary" href="{{ route('plans.edit', $plan->id) }}">Ver <i class="far fa-edit"></i></a>
                              <a class="btn btn-info" href="{{ route('details.plan.index', $plan->url) }}">Ver Detalhes do plano<i class="far fa-edit"></i></a>
                              <a href="{{ route('plans.profiles', $plan->id) }}" class="btn btn-warning"><i class="fas fa-address-book"></i></a>
                          </td>
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
