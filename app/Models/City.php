<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'prefecture_id',
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

    public function postCode()
    {
        return $this->hasMany(PostCode::class);
    }

    public function streets()
    {
        return $this->hasMany(Street::class);
    }

    public function stations()
    {
        return $this->hasMany(Station::class);
    }
}
