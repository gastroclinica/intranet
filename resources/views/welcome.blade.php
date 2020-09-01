@extends('layouts.app')
@section('title', 'Intranet - Gastroclinica')
@section('session')
<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{asset('img/1.png')}}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{asset('img/2.png')}}" class="d-block w-100" alt="...">
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
    <div class="d-flex justify-content-center">
      <div class="row card-deck col-10 text-justify">
        <div class="card">
          <h1>Quem somos</h1>
        <p>
          Há mais de 40 anos, o Hospital Gastroclínica é referência por manter um alto padrão de qualidade em serviços, contando com a eficiência de seus profissionais, e principalmente, pela tradição em atendimento humanizado.
          Em constante atualização, busca acompanhar de perto as inovações tecnológicas na área da saúde, renovando sua infraestrutura, mantendo o respeito e o compromisso em cuidar da saúde e bem-estar de seus pacientes.
        </p>
        </div>
      </div>
    </div>
    <div class="d-flex justify-content-center">
      <div class="row card-deck col-10">
          <div class="card">
            <h1>Missão</h1>
            <p>Acolher, cuidar e promover a assistência em saúde e o bem estar, com ética, atendimento de excelência, otimizando recursos.</p>
        </div>
        <div class="card">
          <h1>Visão</h1>
          <p>Empresa referência em saúde, com excelência em assistência, serviços e processos.</p>
        </div>
        <div class="card">
          <h1>Valores</h1>
            <ul class="space">
            <li>Acolhimento e Humanização</li>
            <li>Ética</li>
            <li>Espírito de Equipe</li>
            <li>Eficiência e Excelência em Serviços</li>
            <li>Profissionalismo</li>
            <li>Respeito</li>
            </ul>
        </div>
      </div>
    </div>      
    <div class="d-flex justify-content-center">
      <div class="row card-deck col-10">
        <div class="card">
            <div id="news">
            <h1>Notícias</h1>
            @foreach($notices as $notice)
                <h6 class="mb-2 mt-4">{{$notice->title}}</h6>
                <p class="text-justify">{{$notice->notice}}</p>
             @endforeach
                <div class="d-flex justify-content-end">
                    <a href="{{route('notice.index')}}" class="btn mt-3" id="button-default">Ver todas</a>
                </div>
            </div>
        </div>
        <div class="card">
          <div class="card-body">
            <h1>Instagram</h1>
            <div class="mt-5">
              <script src="https://cdn.lightwidget.com/widgets/lightwidget.js"></script><iframe src="//lightwidget.com/widgets/a62e24c5edd4517eaa1b91c08cea392c.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width:100%;border:0;overflow:hidden;"></iframe>
            </div>
          </div>
        </div>            
      </div>
    </div>
@endsection