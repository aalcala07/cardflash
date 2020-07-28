<?php

use App\Deck;
use App\Card;
use Illuminate\Database\Seeder;

class CardsTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Deck::insert([
            'name' => 'First Deck',
            'user_id' => 1
        ]);

        $cards = [
            ['What color is the sky?', 'Not green', 'Blue'],
            ['If a tree falls in the forest, but no one is around to hear it, does it make a sound?', 'Paradoxical', 'It depends on how you define "sound"'],
            ['Where is pee stored?', 'Meme', 'In the balls.']
        ];

        foreach ($cards as $card) {
            Card::create([
                'primary_text' => $card[0],
                'secondary_text' => $card[1],
                'answer' => $card[2],
                'deck_id' => 1,
                'user_id' => 1
            ]);
        }
    }
}
