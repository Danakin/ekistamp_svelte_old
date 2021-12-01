<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class LineStation extends Pivot
{
    protected $table = 'line_station';
    public $timestamps = false;

    protected $fillable = [
        'line_id',
        'station_id',
        'order',
    ];

    public function line()
    {
        $this->belongsTo(Line::class);
    }

    public function station()
    {
        $this->belongsTo(Station::class);
    }
}
