<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;  // Add this
use App\Models\SavedJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SavedJobController extends Controller
{
    public function index()
    {
        // Get the authenticated user with eager loading
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        // Load the relationship explicitly
        $savedJobs = SavedJob::where('user_id', $user->id)
            ->with('job.user')
            ->latest()
            ->paginate(10);

        return view('saved.index', compact('savedJobs'));
    }

    public function store(Job $job)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        // Create directly with SavedJob model
        SavedJob::create([
            'user_id' => $user->id,
            'job_id' => $job->id
        ]);

        return back()->with('success', 'Job gespeichert!');
    }

    public function destroy(Job $job)
    {
        // Delete using the SavedJob model directly
        SavedJob::where('user_id', Auth::id())
            ->where('job_id', $job->id)
            ->delete();

        return back()->with('success', 'Job entfernt!');
    }
}
