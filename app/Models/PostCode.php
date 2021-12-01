<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostCode extends Model
{
    protected $table = 'post_codes';

    protected $fillable = [
        'prefecture_id',
        'city_id',
        'post_code',
        'post_code_prefix',
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
        return $this->hasOne(Street::class);
    }
}
