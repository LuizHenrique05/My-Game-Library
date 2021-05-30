@extends('layouts.main')

@section('title', 'My Game Library')

    @section('content')

    <div id="game-show-container" class="col-md-6 offset-md-3">
        <div class="row">
            <div id="image-container" class="col-md-6">
                <img src="/img/games/{{ $game->image }}" class="img-fluid" alt="{{ $game->title }}">
            </div>
            <div id="info-container" class="col-md-6">
                <h1>{{ $game->title }}</h1>
                <p class="game-price">$ {{ $game->price }}</p>      
                <h3>Launch Date: </h3>
                <p>{{ date('d-m-Y', strtotime($game->date)) }}</p>
                <h3>Genres: </h3>
                <ul id="items-list">
                    @foreach ($game->items as $item)
                        <li>
                            <span><ion-icon name="play-outline"></ion-icon> {{ $item }}</span>
                        </li>
                    @endforeach
                </ul>
                
                @if(!$pucharsed)
                    <form action="/games/pucharse/{{ $game->id }}" method="POST">
                        @csrf
                        <a href="/games/pucharse/{{ $game->id }}" class="btn btn-primary" id="game-pucharse" onclick="event.preventDefault(); this.closest('form').submit();">Purchase</a>
                    </form>
                @else
                    <a href="#" class="btn btn-primary" id="already-pucharsed" onclick="event.preventDefault();">Purchased</a>
                @endif
                
            </div>
            <div class="col-md-12" id="description-container">
                <h3>Game Description</h3>
                <p class="game-description">{{ $game->description }}</p>
            </div>
        </div>
    </div>

@endsection