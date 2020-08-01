@extends('layouts.app')
    @section('title', 'Refeição')
        @section('content')
            <div class="d-flex justify-content-center">
                <div class="col-10 textPadrao">
                    @can('Cadastrar Refeicao')
                        <a href="{{route('menu.create')}}" class="btn bg-button mt-2"><i class="fa fa-plus" aria-hidden="true"></i> Nova Refeição</a>
                    @endcan

                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        @if($errors)
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger mt-4" role="alert">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif
                    </div>
                        <table class="table table-striped table-bordered text-center textMenu">
                            <thead>
                                <tr>
                                    <th colspan="4" class="">Cardápio</th>
                                </tr>
                            </thead>
                        @foreach($menus as $menu)
                            <tbody>
                                <tr>
                                    <td>{{date('d/m/Y',strtotime($menu->date))}}</td>
                                    <td>{{$menu->meal}}</td>
                                    <td>{{$menu->description}}</td>
                                    @can('Editar Refeicao')
                                    <td>
                                        <a class="btn bg-button" href="{{ route('menu.edit' , ['menu' => $menu -> id]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>
                                    </td>
                                    @endcan
                                </tr>
                            </tbody>
                        @endforeach
                        </table>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-2">
               {{ $menus->links() }}
            </div>
        @endsection
