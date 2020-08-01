@extends('layouts.app')
@section('title', 'Refeição')
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
            <a class="btn bg-button" href="{{ route('menu.index') }}"><i class="fa fa-reply" aria-hidden="true"></i> Voltar para a listagem</a>
        </div>
    <form method="POST" action="{{route('menu.store')}}">
        @csrf

        <div class="form-group">
            <label for="meal" class="textMenu">Refeição</label>
            <input class="form-control" type="text" name="meal" id="meal" placeholder="Insira uma Refeição" value="{{ old('meal') }}" required >
        </div>

        <div class="form-group">
            <label for="notices" class="textMenu">Descrição</label>
            <textarea class="form-control" name="description" id="description" cols="30" rows="10" placeholder="Insira as informações da refeição" value="{{ old('description') }}" required ></textarea>
        </div>

        <div class="form-group">
            <label for="date" class="textMenu">Data da Refeição</label>
            <input class="form-control" type="date" name="date" id="responsible"value="{{ old('date') }}" required >
        </div>

        <div class="d-flex justify-content-end mt-2">
            <button type="submit" class="btn bg-button"><i class="fa fa-floppy-o" aria-hidden="true"></i> Salvar</button>
        </div>
    </form>
    </div>
</div>
@endsection

