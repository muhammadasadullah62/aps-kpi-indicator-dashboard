<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ObservationSessionScore extends Model
{
    protected $fillable = [
        'observation_session_id',
        'bucket',
        'metric_name',
        'rating',
    ];

    protected function casts(): array
    {
        return [
            'rating' => 'float',
        ];
    }

    public function observationSession(): BelongsTo
    {
        return $this->belongsTo(ObservationSession::class);
    }
}
