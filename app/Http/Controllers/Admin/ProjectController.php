<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
$projects = Project::with('topic')->where('user_id', auth()->id())->get();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $topics = Topic::all();
        return view('admin.projects.create',compact('topics'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'topic_id' => 'required|exists:topics,id',
            'images.*' => 'image|max:2048',
            'main_image_index' => 'nullable|integer|min:0',
        ]);

        $project = new Project();
        $project->sstm = $request->input('sstm');
        $project->title = $request->input('title');
        $project->content = $request->input('content');
        $project->topic_id = $request->input('topic_id');
        $project->user_id = auth()->id();
        $project->save();

        // Обработка изображений
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('public/project');

                $project->images()->create([
                    'path' => Storage::url($path),
                    'is_main' => ($index == $request->main_image_index),
                ]);
            }
        }

        return redirect()->route('admin.projects')->with('success', 'Project created successfully.');
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
        $project = Project::find($id);

        return view('admin.projects.edit', compact('topics','project'));
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

        $project = Project::find($id);
        $project->sstm = $request->input('sstm');
        $project->title = $request->input('title');
        $project->content = $request->input('content');
        $project->topic_id = $request->input('topic_id');
        $project->save();

        return redirect()->route('admin.projects')->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::find($id);
        $project->delete();

        return redirect()->route('admin.projects')->with('success', 'Project deleted successfully.');
    }
}
