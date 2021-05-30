@extends('layouts.main')

@section('title', 'My Game Library')

    @section('content')

    <div class="col-md-6 offset-md-3 mylibrary-title-container">
        <h1>My Games Library</h1>
    </div>
    <div id="search-container" class="col-md-6 offset-md-3">
        <h2>Search Games</h2>
        <form action="/games/mylibrary" method="GET">
            <input type="text" name="search" id="search" class="form-control" placeholder="Search...">
            <input type="submit" class="btn btn-primary col-md-12" value="Search">
        </form>
    </div>
    <div class="col-md-6 offset-md-3 mylibrary-container">
        @if($search)
            <h2>Search for: {{ $search }}</h2>
        @endif
        @if(count($gamesAsBuyer) > 0)
        <div id="games-container" class="col-md-12">
            <div id="cards-container" class="row">
                @foreach ($gamesAsBuyer as $game)
                    <div class="card col-md-3">
                        <img src="/img/games/{{ $game->image }}" alt="{{ $game->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $game->title }}</h5>
                            <a href="/games/{{ $game->id }}" class="btn btn-primary col-md-12">Check info</a>
                            <a href="#" class="btn btn-secondary col-md-12">Install</a>
                        </div>
                    </div>
                @endforeach
                @if(count($gamesAsBuyer) == 0)
                    <p>Games are unavaliable.</p>
                @endif
            </div>
        </div>
        @elseif($search)
            <p>Game not found.</p>
        @else
            <p>You dont have any games pucharsed yet. <a href="/games/gamestore">Buy a new game</a></p>
        @endif
    </div>

@endsection