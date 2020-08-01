@extends('layouts.app')
@section('title','Editar Perfil')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card textMenu">
                    <div class="card-header text-center">Editar Perfil</div>

                    <div class="card-body">

                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        <a class="btn bg-button" href="{{ route('role.index') }}"><i class="fa fa-reply" aria-hidden="true"></i>
                            Voltar para a listagem</a>

                        @if($errors)
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger mt-4" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif

                        <form action="{{ route('role.update', ['role' => $role -> id]) }}" method="post" class="mt-4" autocomplete="off">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Nome do Perfil</label>
                                <input type="text" class="form-control" id="name" placeholder="Insira o nome do Perfil"
                                       name="name" value="{{ old('name') ?? $role -> name}}">
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn bg-button"><i class="fa fa-floppy-o" aria-hidden="true"></i> Alterar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

