<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    protected $fillable = [
        'prefecture_id',
        'city_id',
        'street_id',
        'name',
        'hiragana',
        'katakana',
        'katakana_half',
        'romaji',
        'memo',
        'latitude',
        'altitude',
    ];

    public function prefecture()
    {
        return $this->belongsTo(Prefecture::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function street()
    {
        return $this->belongsTo(Street::class);
    }

    public function lines()
    {
        return $this->belongsToMany(Line::class)->withPivot('order');
    }
}
