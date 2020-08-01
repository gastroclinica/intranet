@extends('layouts.app')
@section('title', 'Notícia')
@section('content')
<div class="d-flex justify-content-center col-12">

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

    <div class="col-10">
    <div class="mb-4">
        <a class="btn bg-button" href="{{ route('notice.index') }}"><i class="fa fa-reply" aria-hidden="true"></i> Voltar para a listagem</a>
    </div>
    <form method="POST" action="{{route('notice.store')}}">
        @csrf

        <div class="form-group">
            <label for="title" class="textMenu">Título da Notícia</label>
            <input class="form-control" type="text" name="title" id="title" placeholder="Insira um titulo" value="{{ old('title') }}" required >
        </div>

        <div class="form-group">
            <label for="notices" class="textMenu">Notícia</label>
            <textarea class="form-control" name="notice" id="" cols="30" rows="10" placeholder="Insira uma notícia" value="{{ old('notice') }}" required ></textarea>
        </div>

        <div class="form-group">
            <label for="responsavel" class="textMenu">Responsável</label>
            <input class="form-control" type="text" name="responsible" id="responsible" placeholder="Insira o Responsável pela notícia" value="{{ old('responsible') }}" required >
        </div>

        <div class="d-flex justify-content-end mt-2">
            <button type="submit" class="btn bg-button"><i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar</button>
        </div>
    </form>
    </div>
</div>
@endsection
