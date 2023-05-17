<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Competition extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'time',
        'event_id'
    ];
    public function event():BelongsTo {
        return $this->belongsTo(Event::class);
    }
}
