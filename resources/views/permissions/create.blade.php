@extends('layouts.app')
@section('title', 'Cadastrar Permissão')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card textMenu">
                    <div class="card-header text-center">Nova Permissão</div>

                    <div class="card-body">

                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        <a class="btn bg-button" href="{{ route('permission.index') }}"><i class="fa fa-reply" aria-hidden="true"></i> Voltar para a listagem</a>

                        @if($errors)
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger mt-4" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif

                        <form action="{{ route('permission.store') }}" method="post" class="mt-4" autocomplete="off">
                            @csrf

                            <div class="form-group">
                                <label for="name">Nome da Permissão</label>
                                <input type="text" class="form-control" id="name" placeholder="Insira o nome da Permissão"
                                       name="name" value="{{ old('name') }}">
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn bg-button"><i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
