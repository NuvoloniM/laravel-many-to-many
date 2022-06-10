<?php

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

// Route::get('/', function () {
//     return view('guest.welcome');
// });

Auth::routes();
// Per gestire tutte le rotte soggette alla stessa cosa si può usare Group 
// tutte le route saranno soggette a controllo autenticazione 
Route::middleware('auth')
->prefix('admin') //tutte le rotte seguenti avranno nella uri /admin all'inizio
->name('admin.') //tutti i name partiranno con admin.
->namespace('Admin')// il percorso delle cartelle partirà con Admin\...
->group(function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('posts', 'PostController');
    Route::resource('categories', 'CategoryController');
});


// alla fine di questo file aggiungiamo una pagina di fallback che va a mappare tutte le rotte non intercettate nelle istruzioni precedenti
// restituisce la view principale 
Route::get("{any?}", function(){
    return view("guest.home");
})->where("any", ".*");