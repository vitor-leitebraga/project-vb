<?php

use App\Actions\Game\CreateGame;
use App\Actions\Game\DestroyGame;
use App\Actions\Game\EditGame;
use App\Actions\Game\IndexGame;
use App\Actions\Game\ShowGame;
use App\Actions\Game\StoreGame;
use App\Actions\Game\UpdateGame;
use App\Actions\Game\UserGames;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/{slug}/games', UserGames::class)->name('user.games');

Route::prefix('games')->name('games.')->group(function(){
	Route::get('/', IndexGame::class)->name('index');

	Route::middleware('auth')->group(function(){
		Route::get('/create', CreateGame::class)->name('create');
		Route::post('/create', StoreGame::class)->name('store');

		Route::get('/{game}/edit', EditGame::class)->name('edit');
		Route::post('/{game}', UpdateGame::class)->name('update');

		Route::delete('/{game}', DestroyGame::class)->name('destroy');
	});

	Route::get('/{game}', ShowGame::class)->name('show');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

});
