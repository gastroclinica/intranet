@extends('layouts.app')
@section('title', 'Ramais')
@section('content')
        <div class="d-flex justify-content-center ">
            <div class="col-md-10">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        @can('Cadastrar Ramal')
                          <a href="{{route('branch.create')}}" class="btn mt-5 mr-2" id="btn-default"><i class="fa fa-plus" aria-hidden="true"></i> Criar Ramal</a>
                        @endcan
                        @if($errors)
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger mt-4" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif

                        <table class="table table-striped">
                            <thead>
                            <tr>
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
                                    <tr>
                                        <td>{{ $branch -> sector }}</td>
                                        <td>{{ $branch -> branch }}</td>
                                        <td> {{ date("H:i", strtotime($branch -> operation_initial)) }} as {{ date("H:i", strtotime($branch -> operation_end)) }}</td>
                                        <td>{{ $branch -> collaborator }}</td>
                                        <td class="d-flex justify-content-center">
                                            @can('Editar Ramal')
                                                    <a class="btn mx-2" id="btn-default" href="{{ route('branch.edit' , ['branch' => $branch -> id]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>
                                            @endcan
                                            @can('Excluir Ramal')
                                                <form action="{{ route('branch.destroy' , ['branch' => $branch -> id]) }}" method="post">
                                                    @csrf
                                                    @method('delete')

                                                    <button class="btn" id="btn-default">
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
@endsection
