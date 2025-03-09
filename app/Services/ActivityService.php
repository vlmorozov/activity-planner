<?php

namespace App\Services;

use App\Models\Activity;

class ActivityService
{
    public function getAll()
    {
        return Activity::all();
    }

}
