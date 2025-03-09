<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ActivityGroup extends Model
{
    /** @use HasFactory<\Database\Factories\ActivityGroupFactory> */
    use HasFactory;

    protected $fillable = [
        'activity_group_id',
    ];

    public function activity(): BelongsTo
    {
        return $this->belongsTo(Activity::class);
    }

    public function activityEvents(): HasMany
    {
        return $this->hasMany(ActivityEvent::class);
    }

    public function organizers(): BelongsToMany
    {
        return $this->belongsToMany(Organizer::class, 'activity_group_organizer');
    }

    public function participants(): BelongsToMany
    {
        return $this->belongsToMany(Participant::class, 'activity_group_participant');
    }
}
