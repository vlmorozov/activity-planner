<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActivityEvent extends Model
{
    /** @use HasFactory<\Database\Factories\ActivityEventFactory> */
    use HasFactory;

    public function activityGroup(): BelongsTo
    {
        return $this->belongsTo(ActivityGroup::class);
    }
}
