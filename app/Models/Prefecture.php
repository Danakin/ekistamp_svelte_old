<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prefecture extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'romaji',
        'hiragana',
        'katakana',
        'katakana_half',
    ];

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function streets()
    {
        return $this->hasMany(Street::class);
    }

    public function postCodes()
    {
        return $this->hasMany(PostCode::class);
    }

    public function lines()
    {
        return $this->hasMany(Line::class);
    }

    public function station()
    {
        return $this->hasMany(Station::class);
    }
}
