<?php

use Illuminate\Support\Facades\Route;

Route::namespace('Cardflash\Http\Controllers')->group(function () {
    Route::prefix(config('cardflash.path'))->middleware(config('cardflash.middleware'))->group(function () {
        Route::get('/', 'DeckController@index')->name('cardflash.home');
        Route::get('/decks', 'DeckController@index')->name('cardflash.decks.index');
        Route::get('/decks/create', 'DeckController@create')->name('cardflash.decks.create');
        Route::post('/decks/store', 'DeckController@store')->name('cardflash.decks.store');
        Route::get('/decks/start/{deck}', 'DeckController@start')->name('cardflash.decks.start');
        Route::get('/decks/{deck}', 'DeckController@show')->name('cardflash.decks.show');
        Route::view('/import', 'cardflash::import')->name('cardflash.import');
        Route::post('/import', 'DeckController@import')->name('cardflash.import.upload');
    });
});