<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    use HasFactory;

    protected $fillable = [
        'prefecture_id',
        'company_id',
        'name',
    ];

    public function prefecture()
    {
        return $this->belongsTo(Prefecture::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function stations()
    {
        return $this->belongsToMany(Station::class)->withPivot('order');
    }

    public function lineStations()
    {
        return $this->hasMany(LineStation::class);
    }
}
