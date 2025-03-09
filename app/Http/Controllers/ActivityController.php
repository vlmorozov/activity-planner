<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreActivityRequest;
use App\Http\Requests\UpdateActivityRequest;
use App\Models\Activity;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ActivityController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        return Inertia::render('Activities', [
            'activities' => $user?->activities ?? [],
        ]);
    }

    public function show(Activity $activity)
    {
        return Inertia::render('Activities', [
            'activities' => $user?->activities ?? [],
        ]);
    }


    public function store(StoreActivityRequest $request)
    {
        try {
            auth()
                ->user()
                ->activities()
                ->create($request->only(['name', 'description']));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add activity');
        }

        return redirect()->back()->with('success', 'Activity added');
    }

    public function update(UpdateActivityRequest $request, Activity $activity)
    {
        $activity->update($request->only(['name', 'description']));

        return redirect()->back()->with('success', 'Activity updated');
    }

    public function destroy(Activity $activity)
    {
        $activity->delete();

        return to_route('activity.index');
    }
}
