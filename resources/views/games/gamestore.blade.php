@extends('layouts.main')

@section('title', 'Games Store')

    @section('content')
    

    <div class="col-md-6 offset-md-3 shop-games-title">
        <h1>Game Shop</h1>
    </div>
    <div id="search-container" class="col-md-6 offset-md-3">
        <h2>Search Games</h2>
        <form action="/games/gamestore" method="GET">
            <input type="text" name="search" id="search" class="form-control" placeholder="Search...">
            <input type="submit" class="btn btn-primary col-md-12" value="Search">
        </form>
    </div>
    <div id="games-container" class="col-md-6 offset-md-3">
        @if($search)
            <h2>Search for: {{ $search }}</h2>
        @endif
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
            @if(count($games) == 0 && $search)
                <p>Games not found</p>
            @elseif(count($games) == 0)
                <p>Games are unavaliable.</p>
            @endif
        </div>
    </div>

@endsection