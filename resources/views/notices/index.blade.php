@extends('layouts.app')
    @section('title', 'Noticias')
        @section('content')
            <div class="d-flex justify-content-center">
                <div class="col-10">
                    @can('Cadastrar Noticia')
                        <a href="{{route('notice.create')}}" class="btn mt-5 mr-2" id="btn-default"><i class="fa fa-plus" aria-hidden="true"></i> Nova Notícia</a>
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
                    @foreach($notices as $notice)
                        <div class="card">
                            <h1>{{$notice->title}}</h1>
                            <div id="card-news">
                                <p class="text-justify">{{$notice->notice}}</p>
                                <div class="d-flex justify-content-end mt-3">
                                    <small>Responsável: {{$notice->responsible}}</small>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mb-2">
                                @can('Editar Noticia')
                                    <a class=" btn mt-2 mr-2" id="btn-default" href="{{ route('notice.edit' , ['notice' => $notice -> id]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>
                                @endcan
                                    <a class="btn mt-2" id="btn-default" href="{{route('notice.show', $notice->id)}}">Ler mais</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="d-flex justify-content-center mt-2">
               {{ $notices->links() }}
            </div>
        @endsection
