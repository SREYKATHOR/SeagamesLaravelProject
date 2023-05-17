<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Stadium extends Model
{
    use HasFactory;
    protected $fillable = [
        'stadium_name',
        'number_of_seat',
        'address'
    ];
    public function event():BelongsToMany {
        return $this->belongsToMany(Event::class);
    }
}
