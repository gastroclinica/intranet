@extends('layouts.app')

@section('title', 'Ramais')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">

                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        <a href="{{route('branch.index')}}" class="btn textMenu bg-button">Voltar para a listagem</a>

                        @if($errors)
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger mt-4" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif

                        <table class="table table-striped mt-4">
                            <thead>
                            <tr class="textMenu">
                                <th>#</th>
                                <th>Ramal</th>
                                <th>Setor</th>
                                <th>Colaborador</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($branchs as $branch)

                                <tr class="textMenu">
                                    <td>{{ $branch -> id }}</td>
                                    <td>{{ $branch -> branch }}</td>
                                    <td>{{ $branch -> sector }}</td>
                                    <td>{{ $branch -> collaborator }}</td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
