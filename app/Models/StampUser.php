<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class StampUser extends Pivot
{
    protected $table = "stamp_user";

    protected $fillable = [
        'stamp_id',
        'user_id',
    ];

    public function stamp()
    {
        return $this->belongsTo(Stamp::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
