@extends('layouts.app')
@section('title', 'Notícia')
@section('content')
<div class="d-flex justify-content-center">
    <div class="col-10">
        <div>
            <a class="btn mt-5" href="{{ route('notice.index') }}" id="btn-default"><i class="fa fa-reply" aria-hidden="true"></i> Voltar para a listagem</a>
        </div>
    <div class="card-body">

        @if (session('message'))
            <div class="alert alert-success 2" role="alert">
                {{ session('message') }}
            </div>
        @endif

        @if($errors)
            @foreach($errors->all() as $error)
                <div class="alert alert-danger mt-2" role="alert">
                    {{ $error }}
                </div>
            @endforeach
        @endif

    </div>
    <form method="POST" action="{{route('notice.store')}}">
        @csrf

        <div class="form-group">
            <label for="title">Título da Notícia</label>
            <input class="form-control" type="text" name="title" id="title" placeholder="Insira um titulo" value="{{ old('title') }}" required >
        </div>

        <div class="form-group">
            <label for="notices">Notícia</label>
            <textarea class="form-control" name="notice" id="" cols="30" rows="10" placeholder="Insira uma notícia" value="{{ old('notice') }}" required ></textarea>
        </div>

        <div class="form-group">
            <label for="responsavel">Responsável</label>
            <input class="form-control" type="text" name="responsible" id="responsible" placeholder="Insira o Responsável pela notícia" value="{{ old('responsible') }}" required >
        </div>

        <div class="d-flex justify-content-end mt-2">
            <button type="submit" class="btn" id="btn-default"><i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar</button>
        </div>
    </form>
    </div>
</div>
@endsection
