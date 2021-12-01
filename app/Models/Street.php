<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Street extends Model
{
    protected $fillable = [
        'prefecture_id',
        'city_id',
        'post_code_id',
        'name',
        'romaji',
        'hiragana',
        'katakana',
        'katakana_half',
    ];

    public function prefecture()
    {
        return $this->belongsTo(Prefecture::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function postCode()
    {
        return $this->belongsTo(PostCode::class);
    }

    public function stations()
    {
        return $this->hasMany(Station::class);
    }
}
