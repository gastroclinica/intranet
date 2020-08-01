@extends('layouts.app')
    @section('title', 'Noticias')
        @section('content')
            <div class="d-flex justify-content-center">
                <div class="col-8 textPadrao">
                    @can('Cadastrar Noticia')
                        <a href="{{route('notice.create')}}" class="btn bg-button mt-2 mr-2"><i class="fa fa-plus" aria-hidden="true"></i> Nova Notícia</a>
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
                        <div class="card mt-2">
                            <h5 class="card-header text-center cardTitle">{{$notice->title}}</h5>
                            <div class="card-body">
                                <p class="text-justify text-previa-notices">{{$notice->notice}}</p>
                            </div>
                            <div class="d-flex justify-content-end mb-2">
                                @can('Editar Noticia')
                                    <a class=" btn bg-button mt-2 mr-2" href="{{ route('notice.edit' , ['notice' => $notice -> id]) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>
                                @endcan
                                    <a class="btn bg-button  mt-2 mr-2" href="{{route('notice.show', $notice->id)}}">Ler mais</a>
                            </div>
                            <div class="card-footer text-muted">
                                <small>Responsável: {{$notice->responsible}}</small>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="d-flex justify-content-center mt-2">
               {{ $notices->links() }}
            </div>
        @endsection
