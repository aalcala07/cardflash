<?php

namespace Cardflash\Http\Controllers;

use Cardflash\Card;
use Cardflash\Deck;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CardController extends Controller
{
    public function create(Request $request, Deck $deck)
    {
        return view('cardflash::cards.create', compact('deck'));
    }

    public function store(Request $request)
    {
        $card = new Card();
        $card->primary_text = $request->input('primary_text');
        $card->secondary_text = $request->input('secondary_text');
        $card->answer = $request->input('answer');
        $card->deck_id = $request->input('deck_id');
        $card->user_id = auth()->user()->id;

        if ($card->save()) {
            return redirect(route('cardflash.decks.show', $card->deck_id))->with('success_message', 'Success! Card created.');
        } else {
            return redirect(route('cardflash.cards.create', $request->input('deck_id')))->with('error_message', 'Error! Unable to create card.')->withInput();
        }
    }

    public function edit(Request $request, Card $card)
    {
        return view('cardflash::cards.edit', compact('card'));
    }

    public function update(Request $request, Card $card)
    {
        $card->primary_text = $request->input('primary_text');
        $card->secondary_text = $request->input('secondary_text');
        $card->answer = $request->input('answer');
        if ($card->save()) {
            return redirect(route('cardflash.decks.show', $card->deck_id))->with('success_message', 'Success! Card updated.');
        } else {
            return redirect(route('cardflash.cards.edit', $card->id))->with('error_message', 'Error! Unable to update card.');
        }
    }

    public function deleteCheck(Request $request, Card $card)
    {
        return view('cardflash::cards.delete', compact('card'));
    }

    public function destroy(Request $request, Card $card)
    {
        $deckId = $card->deck_id;
        if ($card->delete()) {
            return redirect(route('cardflash.decks.show', $deckId))->with('success_message', 'Success! Card deleted.');
        } else {
            return redirect(route('cardflash.cards.deleteCheck', $card->id))->with('error_message', 'Error! Unable to delete card.');
        }

    }
}