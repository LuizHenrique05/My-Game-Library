@extends('layouts.main')

@section('title', 'My Games')

    @section('content')

    <div class="col-md-6 offset-md-3 mygames-title-container">
        <h1>My Games Registered</h1>
    </div>
    <div class="col-md-6 offset-md-3 mygames-container">
        @if(count($games) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($games as $game)
                        <tr>
                            <td scope="row">{{ $loop->index + 1 }}</td>
                            <td>
                                <a href="/games/{{ $game->id }}">{{ $game->title }}</a>
                            </td>
                            <td style="max-width: 500px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">{{ $game->description }}</td>
                            <td>
                                <a href="/games/edit/{{ $game->id }}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon> Editar</a>
                                <form action="/games/{{ $game->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row" style="display: flex;justify-content: flex-end">
                <a href="/games/create" class="btn btn-primary col-md-3">Register new Game</a>
            </div>
        @else
            <p>You dont have any games registered yet. <a href="/games/create">Register new game</a></p>
        @endif
    </div>

@endsection