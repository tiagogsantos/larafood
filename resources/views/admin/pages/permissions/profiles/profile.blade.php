@extends('adminlte::page')

@section('title', "Permissões do perfil {$permission->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('profiles.index') }}" class="active">Perfis</a></li>
    </ol>

    <h1>Perfis da permissão<strong> {{ $permission->name }}</strong></h1>

@stop

@section('content')

    @include('admin.includes.alerts')

    @if(count($profiles) == 0)
        <div class="alert alert-warning">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <p class="text-white font-weight-bold font-italic"><i class="fas fa-exclamation"></i> Até o momento não possui perfis cadastrados a permissão {{ $permission->name }} !</p>
        </div>
    @endif


    <div class="card">
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th width="50">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($profiles as $profile)
                    <tr>
                        <td>
                            {{ $profile->name }}
                        </td>
                        <td style="width=10px;">
                            <a href="{{ route('profiles.permission.detach', [$profile->id, $permission->id]) }}" class="btn btn-danger">DESVINCULAR</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if (isset($filters))
                {!! $profiles->appends($filters)->links() !!}
            @else
                {!! $profiles->links() !!}
            @endif
        </div>
    </div>
@stop
