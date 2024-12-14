<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class JobController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        $jobs = Job::active()
            ->with('User')
            ->latest()
            ->paginate(10);

        return view ('jobs.index', compact('jobs'));
    }

    public function show(Job $job)
    {
        return view('jobs.show', compact('job'));
    }

    public function create()
    {
        $this->authorize('create', Job::class);
        return view ('jobs.create');

    }

    public function store(Request $request)
    {
        $this->authorize('create', Job::class);

        $validated = $request->validate([
            'title' => 'required|min:3|max:255',
            'company' => 'required|min:3|max:255',
            'location' => 'required|max:255',
            'type' => 'required|in:Vollzeit,Teilzeit,Remote',
            'salary_min' => 'required|numeric|min:0',
            'salary_max' => 'required|numeric|gt:salary_min',
            'description' => 'required|min:50',
            'requirements' => 'required|min:50',
            'benefits' => 'required|min:30',
        ]);

        $job = auth()->user()->jobs()->create($validated);

        return redirect()->route('job.show', $job)
            ->with('success', 'Stellenanzeige erfolgreich erstellt');

    }
}
