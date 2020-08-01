@extends('layouts.app')
@section('title', 'Permissões')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card textMenu">
                    <div class="card-header text-center">Permissões</div>

                    <div class="card-body">

                        <a class="btn bg-button" href="{{ route('role.index') }}"><i class="fa fa-reply" aria-hidden="true"></i> Voltar para a listagem</a>

                        @if($errors)
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger mt-4" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif

                        <h2 class="mt-4">Permissões para: {{ $role -> name }}</h2>

                        <form action="{{ route('role.permissionsSync', ['role' => $role -> id]) }}" method="post" class="mt-4" autocomplete="off">
                            @csrf
                            @method('PUT')

                            @foreach($permissions as $permission)
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="{{ $permission -> id }}" name="{{ $permission -> id }}" {{ ($permission -> can == '1' ? 'checked' : '')}}>
                                    <label class="custom-control-label" for="{{ $permission -> id }}">{{ $permission -> name }}</label>
                                </div>
                            @endforeach

                            <button type="submit" class="btn btn-block bg-button mt-4">Sincronizar {{ $role -> name }}</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
