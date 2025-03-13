<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActivityGroupRequest;
use App\Http\Requests\UpdateActivityGroupRequest;
use App\Models\Activity;
use App\Models\ActivityGroup;

class ActivityGroupController extends Controller
{
    public function store(StoreActivityGroupRequest $request, ActivityGroup $activityGroup)
    {
    }

//    public function show(ActivityGroup $activityGroup)
//    {
//        //
//    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateActivityGroupRequest $request, ActivityGroup $activityGroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ActivityGroup $activityGroup)
    {
        //
    }
}
