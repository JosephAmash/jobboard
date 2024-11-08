<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class SavedJobController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $savedJobs = auth()->user()
            ->savedJobs()
            ->with('job.user')
            ->latest()
            ->paginate(10);

        return view('saved.index', compact('savedJobs'));
    }

    public function store(Job $job)
    {
        auth()->user()->savedJobs()->create([
            'job_id' => $job->id
        ]);

        return back()->with('success', 'Job gespeichert!');
    }

    public function destroy(Job $job)
    {
        auth()->user()
            ->savedJobs()
            ->where('job_id', $job->id)
            ->delete();

        return back()->with('success', 'Job entfernt!');
    }
}
