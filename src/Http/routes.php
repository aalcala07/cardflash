<?php

use Illuminate\Support\Facades\Route;

Route::namespace('Cardflash\Http\Controllers')->group(function () {
    Route::prefix(config('cardflash.path'))->middleware(config('cardflash.middleware'))->group(function () {
        Route::get('/', 'DeckController@index')->name('cardflash.home');
        Route::get('/decks', 'DeckController@index')->name('cardflash.decks.index');
        Route::get('/decks/create', 'DeckController@create')->name('cardflash.decks.create');
        Route::post('/decks/store', 'DeckController@store')->name('cardflash.decks.store');
        Route::get('/decks/edit/{deck}', 'DeckController@edit')->name('cardflash.decks.edit');
        Route::get('/decks/delete/{deck}', 'DeckController@deleteCheck')->name('cardflash.decks.deleteCheck');
        Route::delete('/decks/{deck}', 'DeckController@destroy')->name('cardflash.decks.destroy');
        Route::patch('/decks/{deck}', 'DeckController@update')->name('cardflash.decks.update');
        Route::get('/decks/start/{deck}', 'DeckController@start')->name('cardflash.decks.start');
        Route::get('/decks/{deck}', 'DeckController@show')->name('cardflash.decks.show');


        Route::get('/decks/{deck}/cards/create', 'CardController@create')->name('cardflash.cards.create');
        Route::post('/cards/store', 'CardController@store')->name('cardflash.cards.store');
        Route::get('/cards/{card}/edit', 'CardController@edit')->name('cardflash.cards.edit');
        Route::patch('/cards/{card}', 'CardController@update')->name('cardflash.cards.update');
        Route::get('/cards/{card}/delete', 'CardController@deleteCheck')->name('cardflash.cards.deleteCheck');
        Route::delete('/cards/{card}', 'CardController@destroy')->name('cardflash.cards.destroy');

        Route::view('/import', 'cardflash::import')->name('cardflash.import');
        Route::post('/import', 'DeckController@import')->name('cardflash.import.upload');
    });
});