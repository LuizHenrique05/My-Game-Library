@extends('layouts.main')

@section('title', 'My Games')

    @section('content')

    <div id="game-create-container" class="col-md-6 offset-md-3">
        <h1>Register your game bellow</h1>
        <form action="/games/update/{{ $game->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="image">Game Image</label>
                <input type="file" name="image" id="image" class="form-control-file">
                <img src="/img/games/{{ $game->image }}" alt="{{ $game->title }}" class="img-preview">
            </div>
            <div class="form-group">
                <label for="title">Game Title:</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ $game->title }}">
            </div>
            <div class="form-group">
                <label for="date">Game Launch Date:</label>
                <input type="date" class="form-control" name="date" id="date" value="{{ date('Y-m-d', strtotime($game->date)) }}">
            </div>
            <div class="form-group">
                <label for="price">Game Price:</label>
                <input type="number" class="form-control" min="1" max="10000" step="any" name="price" id="price" value="{{ $game->price }}">
            </div>
            <div class="form-group">
                <label for="description">Game Description:</label>
                <textarea name="description" class="form-control" id="description" placeholder="Tell about your game">{{ $game->description }}</textarea>
            </div>
            <div class="form-group genre">
                <label for="genre">Game Genre: (can be selected more then 1 option)</label>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Action"> Action
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Adventure"> Adventure
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="RPG"> RPG
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="FPS"> FPS
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Strategy"> Strategy
                </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Register Game">
        </form>
    </div>

@endsection