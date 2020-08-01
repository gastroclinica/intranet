@extends('layouts.app')
@section('title', 'Ramais')
@section('content')
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-10">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        @can('Cadastrar Ramal')
                          <a href="{{route('branch.create')}}" class="btn bg-button"><i class="fa fa-plus" aria-hidden="true"></i> Criar Ramal</a>
                        @endcan
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
                                <th>Setor</th>
                                <th>Ramal</th>
                                <th>Funciona de:</th>
                                <th>Colaborador</th>
                                @can('Informatica')
                                <th>Ações</th>
                                @else
                                <th></th>
                                @endcan
                            </tr>
                            </thead>
                            <tbody>

                                @foreach($branchs as $branch)
                                    <tr class="textMenu capitalize">
                                        <td>{{ $branch -> sector }}</td>
                                        <td>{{ $branch -> branch }}</td>
                                        <td> {{ date("H:i", strtotime($branch -> operation_initial)) }} as {{ date("H:i", strtotime($branch -> operation_end)) }}</td>
                                        <td>{{ $branch -> collaborator }}</td>
                                        <td class="d-flex">
                                            @can('Editar Ramal')
                                                <button class="btn bg-button mx-2">
                                                    <a class="text-button" href="{{ route('branch.edit' , ['branch' => $branch -> id]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> Editar
                                                </button>
                                            @endcan
                                            @can('Excluir Ramal')
                                                <form action="{{ route('branch.destroy' , ['branch' => $branch -> id]) }}" method="post">
                                                    @csrf
                                                    @method('delete')

                                                    <button class="btn bg-button">
                                                        <a><i class="fa fa-trash" aria-hidden="true"></i></a> Excluir
                                                    </button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
            </div>
        </div>
    </div>
@endsection
