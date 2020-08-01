@extends('layouts.app')
@section('title', 'Intranet - Gastroclinica')
@section('session')
<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="http://www.gastroclinicahospital.com.br/wp-content/uploads/2018/06/carrossel_suite_pp.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="http://www.gastroclinicahospital.com.br/wp-content/uploads/2018/06/carrossel_uti_neonatal.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="http://www.gastroclinicahospital.com.br/wp-content/uploads/2018/06/carrossel_pronto_atendimento.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
@endsection
@section('content')
    <div class="card-deck textPadrao">
        <div class="card">
            <h5 class="card-header text-center cardTitle">Missão</h5>
        <div class="card-body text-justify">
            <p>Acolher, cuidar e promover a assistência em saúde e o bem estar, com ética, atendimento de excelência, otimizando recursos.</p>
        </div>
    </div>
    <div class="card">
        <h5 class="card-header text-center cardTitle">Visão</h5>
            <div class="card-body text-justify">
            <p>Empresa referência em saúde, com excelência em assistência, serviços e processo.</p>
        </div>
    </div>
    <div class="card">
        <h5 class="card-header text-center cardTitle">Valores</h5>
            <div class="card-body text-justify">
                <p>Acolhimento e Humanização, Ética, Espírito de Equipe, Eficiência e Excelência em Serviços, Profissionalismo, Respeito.</p>
            </div>
        </div>
    </div>
    <div class="card-deck mt-5">
        <div class="card">
            <h5 class="card-header text-center cardTitle">Notícias</h5>
            <div class="card-body">
            @foreach($notices as $notice)
                 <h5 class="text-center textMenu">{{$notice->title}}</h5>
                 <div>
                     <p class="container text-justify text-previa">{{$notice->notice}}</p>
                </div>
                <div>
                    <small class="d-flex justify-content-end">{{$notice->responsible}}</small>
                </div>
             @endforeach
                <div class="d-flex justify-content-end">
                    <a href="{{route('notice.index')}}" class="btn bg-button btn-small mt-4">Ver todas</a>
                </div>
            </div>
        </div>
        <div class="card border">
          <h5 class="card-header text-center cardTitle">Cardápio</h5>
          <div class="card-body">
            <a href="{{route('menu.index')}}"><img src="{{asset('img/menu.png')}}" class="img-thumbnail"></a> 
          </div>
        </div>            
    </div>
@endsection