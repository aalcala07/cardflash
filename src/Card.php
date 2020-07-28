<?php

namespace Cardflash;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = ['primary_text', 'secondary_text', 'answer', 'deck_id', 'user_id'];

    public function deck()
    {
        return $this->belongsTo('Cardflash\Deck');
    }
}
