<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'total_ticket',
        'sport_id',
        'stadium_id'
    ];

    public function sport():HasOne {
        return $this->hasOne(Sport::class);
    }

    public function stadium():HasOne {
        return $this->hasOne(Stadium::class);
    }

    public function competition():HasMany {
        return $this->hasMany(Competition::class);
    }
    public function ticket():BelongsTo{
        return $this->belongsTo(Ticket::class);
    }

}
