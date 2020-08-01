@extends('layouts.app')
@section('title', 'Noticias')
@section('content')
<div class="d-flex justify-content-center">
    <div class="col-10">
        <a class="btn bg-button mb-5" href="{{route('notice.index')}}"><i class="fa fa-reply" aria-hidden="true"></i>Voltar</a>
        <div class="card textPadrao">
            <h5 class="card-header text-center cardTitle">{{$notice->title}}</h5>
            <div class="card-body">
                <p class="card-text text-justify text-center">{{$notice->notice}}</p>
            </div>
            <div class="card-footer text-muted">
                <small>Responsável: {{$notice->responsible}}</small>
            </div>
        </div>
    </div>
</div>
@endsection
