<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Organizer extends Model
{
    /** @use HasFactory<\Database\Factories\OrganizerFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function activityGroups(): BelongsToMany
    {
        return $this->belongsToMany(ActivityGroup::class, 'activity_group_organizer');
    }
}
