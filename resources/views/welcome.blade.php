@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')

    {{--

    OBSERVAÇÕES

    1. 'name' em inputs é usado para identificar o campo no 'body' da requisição.

    2. 'col-md-12' faz o elemento ocupar 100% da largura da tela em PCs, 'col-md-3' faz ocupar 25% da largura, etc.

    3. 'style.css' sempre deve ser importado depois do BootStrap.




    --}}


    {{--
    CARREGAR DADOS DE TESTE

    cmd:

    psql -U postgres -d laravel

    INSERT INTO events (title, description, city, private) VALUES ('Evento1', 'Descrição1', 'Cidade1', false);

    INSERT INTO events (title, description, city, private) VALUES ('Evento2', 'Descrição2', 'Cidade2', false);

    INSERT INTO events (title, description, city, private) VALUES ('Evento3', 'Descrição3', 'Cidade3', false);

    --}}

    <div id="search-container" class="col-md-12">
        <h1>Busque um evento</h1>

        <form action="">
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
        </form>
    </div>

    <div id="events-container" class="col-md-12">
        <h2>Próximos Eventos</h2>

        <p class="subtitle">Veja os eventos dos próximos dias</p>

        <div id="cards-container" class="row g-4">
            @foreach ($events as $event)
                <div class="col-md-3">
                    <div class="card h-100">
                        @if($event->image)
                            <img src="/img/events/{{ $event->image }}" alt="{{ $event->title }}">
                        @else
                            <img src="/img/image-placeholder.png" alt="{{ $event->title }}">
                        @endif
                        <div class="card-body">
                            <p class="card-date">{{ date('d/m/Y', strtotime($event->date)) }}</p>
                            <h5 class="card-title">{{ $event->title }}</h5>
                            <p class="card-participants">X Participantes</p>
                            <a href="/events/{{ $event->id }}" class="btn btn-primary">Saber mais</a>
                        </div>
                    </div>
                </div>

            @endforeach

            @if(count($events) == 0)
                <p>Não há eventos disponíveis</p>
            @endif
        </div>
    </div>

@endsection