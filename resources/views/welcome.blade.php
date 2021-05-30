@extends('layouts.main')

@section('title', 'My Game Library')

    @section('content')

    <div class="col-md-6 offset-md-3 home-games-title">
        <h1>Check those games</h1>
    </div>
    <div id="games-container" class="col-md-6 offset-md-3 home-games-title">
        <div id="cards-container" class="row">
            @foreach ($games as $game)
                <div class="card col-md-3">
                    <img src="/img/games/{{ $game->image }}" alt="{{ $game->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $game->title }}</h5>
                        <p class="card-price">${{ $game->price }}</p>
                        <a href="/games/{{ $game->id }}" class="btn btn-primary">Saber mais</a>
                    </div>
                </div>
            @endforeach
            @if(count($games) == 0)
                <p>Games are unavaliable.</p>
            @endif
        </div>
    </div>
        
@endsection