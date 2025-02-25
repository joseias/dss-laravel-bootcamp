<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Events\ChirpCreated;

class Chirp extends Model
{
    protected $fillable = [
        'message',
    ];

    protected $dispatchesEvents = [
        'created' => ChirpCreated::class,
    ];
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(related: User::class);
    }
}
