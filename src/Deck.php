<?php

namespace Cardflash;

use Illuminate\Database\Eloquent\Model;

class Deck extends Model
{
    protected $fillable = ['name', 'user_id'];

    public function cards()
    {
        return $this->hasMany('Cardflash\Card');
    }
}
