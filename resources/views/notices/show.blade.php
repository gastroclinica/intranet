@extends('layouts.app')
@section('title', 'Noticias')
@section('content')
<div class="d-flex justify-content-center">
    <div class="col-8">
        <div class="mb-4">
            <a class="btn mt-5" href="{{ route('notice.index') }}" id="btn-default"><i class="fa fa-reply" aria-hidden="true"></i> Voltar para a listagem</a>
        </div>
        <div class="card">
            <h1 class="text-center">{{$notice->title}}</h1>
            <div class="card-body" id="card-select">
                <p class="card-text text-justify">{{$notice->notice}}</p>
                <div class="d-flex justify-content-end mt-5">
                    <small>Responsável: {{$notice->responsible}}</small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
