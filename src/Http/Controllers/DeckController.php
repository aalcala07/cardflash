<?php

namespace Cardflash\Http\Controllers;

use Cardflash\Deck;
use Cardflash\Card;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DeckController extends Controller
{
    public function index()
    {
        $decks = Deck::all();
        return view('cardflash::decks.index', compact('decks'));
    }

    public function start(Request $request, Deck $deck)
    {
        $cards = $deck->cards->shuffle();
        return view('cardflash::decks.start', compact('deck', 'cards'));
    }

    public function show(Request $request, Deck $deck)
    {
        return view('cardflash::decks.show', compact('deck'));
    }

    public function create(Request $request)
    {
        return view('cardflash::decks.create');
    }

    public function store(Request $request)
    {
        $deck = new Deck([
            'name' => $request->input('name'),
            'user_id' => auth()->user()->id
        ]);

        if ($deck->save()) {
            return redirect(route('cardflash.decks.show', $deck->id))->with('success_message', 'Success! Deck created.');
        } else {
            return redirect(route('cardflash.decks.create'))->with('error_message', 'Error! Unable to create deck.');
        }
    }

    public function import(Request $request)
    {
        $file = $request->file('cards_csv');
        $csv = array_map('str_getcsv', file($file));
        $cards = [];

        foreach ($csv as $columns) {
            $cards[] = [
                'primary_text' => $columns[0],
                'secondary_text' => $columns[1],
                'answer' => $columns[2],
                'deck_id' => $request->input('deck_id'),
                'user_id' => auth()->user()->id
            ];
        }

        if (Card::insert($cards)) {
            return redirect(route('cardflash.import'))->with('success_message', 'Success! ' . count($cards) . " cards have been imported.");
        } else {
            return redirect(route('cardflash.import'))->with('error_message', 'Error! Unable to import cards.');
        }
    }

}
