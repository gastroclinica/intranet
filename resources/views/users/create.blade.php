@extends('layouts.app')
@section('title', 'Cadastro de Usuários')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card textMenu">
                    <div class="card-header text-center">Cadastro de Usuários</div>

                    <div class="card-body">

                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        <div>
                            <a class="btn bg-button" href="{{ route('user.index') }}"><i class="fa fa-reply" aria-hidden="true"></i> Voltar para a listagem</a>
                        </div>

                        @if($errors)
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger mt-4" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif

                        <form action="{{ route('user.store') }}" method="post" class="mt-4" autocomplete="off">
                            @csrf

                            <div class="form-group">
                                <label for="name">Nome do Usuário</label>
                                <input type="text" class="form-control" id="name" placeholder="Insira o nome completo"
                                       name="name" value="{{ old('name') }}">
                            </div>

                            <div class="form-group">
                                <label for="email">E-Mail</label>
                                <input type="email" class="form-control" id="email" placeholder="Insira seu e-mail"
                                       name="email" value="{{ old('email') }}">
                            </div>

                            <div class="form-group">
                                <label for="password">Senha</label>
                                <input type="password" class="form-control" id="password" placeholder="Insira a senha"
                                       name="password" value="{{ old('password') }}">
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
