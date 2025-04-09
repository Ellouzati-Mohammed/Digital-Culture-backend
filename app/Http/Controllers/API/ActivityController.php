<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{


    public function index()
    {
        $activities = Activity::with(['video','pdf'])->get();

        return response()->json([
            'activities' => $activities
        ]);
    }


    public function store(Request $request)
{
    $validated = $request->validate([
        'course_id' => 'required|exists:courses,id',
        'activity_type' => 'required|in:video,pdf',
        // Champs spécifiques selon le type
        'pdf_title' => 'required_if:activity_type,pdf|string|max:255',
        'pdf_url' => 'required_if:activity_type,pdf|url',

        'video_title' => 'required_if:activity_type,video|string|max:255',
        'video_url' => 'required_if:activity_type,video|url',
        'duration' => 'required_if:activity_type,video|numeric|min:1',
    ]);

    // Création de l'activité principale
    $activity = Activity::create([
        'course_id' => $validated['course_id'],
        'activity_type' => $validated['activity_type'],
    ]);

    if ($activity->activity_type === 'pdf') {
        $activity->pdf()->create([
            'pdf_title' => $validated['pdf_title'],
            'pdf_url' => $validated['pdf_url'],
        ]);
    } elseif ($activity->activity_type === 'video') {
        $activity->video()->create([
            'video_title' => $validated['video_title'],
            'video_url' => $validated['video_url'],
            'duration' => $validated['duration'],
        ]);
    }

    return response()->json([
        'message' => 'Activité créée avec succès',
        'activity' => $activity->load(['pdf', 'video'])
    ], 201);
}

}
