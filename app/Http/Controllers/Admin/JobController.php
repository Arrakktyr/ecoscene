<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::with('topic')->where('user_id', auth()->id())->get();
        return view('admin.news.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $topics = Topic::all();
        return view('admin.news.create',compact('topics'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'location' => 'required',
            'topic_id' => 'required|exists:topics,id',
            'images.*' => 'image|max:2048',
            'main_image_index' => 'nullable|integer|min:0',
        ]);

        $jobs = new Job();
        $jobs->sstm = $request->input('sstm');
        $jobs->title = $request->input('title');
        $jobs->description = $request->input('description');
        $jobs->location = $request->input('location');
        $jobs->start_date = $request->input('start_date');
        $jobs->topic_id = $request->input('topic_id');
        $jobs->user_id = auth()->id();
        $jobs->save();

        // Обработка изображений
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('public/jobs');

                $news->images()->create([
                    'path' => Storage::url($path),
                    'is_main' => ($index == $request->main_image_index),
                ]);
            }
        }

        return redirect()->route('admin.jobs')->with('success', 'Job created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $topics =  Topic::all();
        $job = Job::find($id);

        return view('admin.job.edit', compact('topics','job'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'topic_id' => 'required|exists:topics,id',
        ]);

        $jobs = new Job();
        $jobs->sstm = $request->input('sstm');
        $jobs->title = $request->input('title');
        $jobs->description = $request->input('description');
        $jobs->location = $request->input('location');
        $jobs->start_date = $request->input('start_date');
        $jobs->topic_id = $request->input('topic_id');
        $jobs->user_id = auth()->id();
        $jobs->save();

        return redirect()->route('admin.jobs')->with('success', 'Job updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jobs = Job::find($id);
        $jobs->delete();

        return redirect()->route('admin.jobs')->with('success', 'Job deleted successfully.');
    }
}
