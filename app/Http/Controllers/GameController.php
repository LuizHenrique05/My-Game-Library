<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Game;
use App\Models\User;

class GameController extends Controller
{
    public function index() {
        $games = Game::all();

        return view('welcome', ['games' => $games ]);
    }

    public function create() {
        return view('games.create');
    }

    public function store(Request $request) {
        $game = new Game;

        $game->title = $request->title;
        $game->date = $request->date;
        $game->description = $request->description;
        $game->price = $request->price;
        $game->items = $request->items;

        //Image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;
            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . '.' . $extension;

            $requestImage->move(public_path('img/games'), $imageName);

            $game->image = $imageName;
        }

        $user = auth()->user();
        $game->user_id = $user->id;

        $game->save();

        return redirect('/games/mygames');
    }

    public function show($id) {
        $game = Game::findOrFail($id);
        $user = auth()->user();
        $pucharsed = false;

        if($user) {
            $gameBuyed = $user->gamesAsBuyer->toArray();

            foreach($gameBuyed as $oneGame){
                if($oneGame['id'] == $id) {
                    $pucharsed = true;
                }
            }
        }

        return view('games.show', ['game' => $game, 'pucharsed' => $pucharsed ]);
    }

    public function edit($id){
        $user = auth()->user();
        $game = Game::findOrFail($id);

        if($user->id != $game->user_id){
            return redirect('/games/mygames');
        }

        return view('games.edit', ['game' => $game]);
    }

    public function update(Request $request) {
        $data = $request->all();

        //Image Edit
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $requestImage = $request->image;
            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . '.' . $extension;

            $requestImage->move(public_path('img/games'), $imageName);

            $data['image'] = $imageName;
        }

        Game::findOrFail($request->id)->update($data);

        return redirect('/games/mygames');
    }

    public function destroy($id) {
        Game::findOrFail($id)->delete();

        return redirect('/games/mygames');
    }

    public function buyGame($id){
        $user = auth()->user();
        $user->gamesAsBuyer()->attach($id);

        $game = Game::findOrFail($id);

        return redirect('/games/mylibrary');
    }

    public function mygames(){
        $user = auth()->user();
        $games = $user->games;

        return view('games.mygames', ['games' => $games]);
    }

    public function gamestore(){
        $search = request('search');
        if($search){
            $games = Game::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();
        } else {
            $games = Game::all();
        }

        return view('games.gamestore', ['games' => $games, 'search' => $search]);
    }

    public function mylibrary() {
        $user = auth()->user();
        $games = $user->games;
        $search = request('search');
        $game_ids = [];
        if($search){
            $game_ids = DB::table('game_user')->where('user_id', $user->id)->pluck('game_id');
            $gamesAsBuyer = DB::table('games')->where('title', 'like', '%'.$search.'%')->whereIn('id', $game_ids)->get();
        } else {
            $gamesAsBuyer = $user->gamesAsBuyer;
        }

        return view('games.mylibrary', ['games' => $games, 'gamesAsBuyer' => $gamesAsBuyer, 'search' => $search, 'game_ids' => $game_ids ]);
    }

    public function dashboard() {
        $user = auth()->user();

        return view('games.dashboard', ['user' => $user]);
    }

    public function updateAccount(Request $request) {
        $user = auth()->user();

        User::findOrFail($user->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return redirect('/dashboard');
    }
}
