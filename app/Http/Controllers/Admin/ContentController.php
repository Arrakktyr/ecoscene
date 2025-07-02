<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
$contents = Content::with('topic')->where('user_id', auth()->id())->get();
        return view('admin.contents.index', compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $topics = Topic::all();
        return view('admin.contents.create',compact('topics'));
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

        $content = new Content();
        $content->sstm = $request->input('sstm');
        $content->title = $request->input('title');
        $content->content = $request->input('content');
        $content->topic_id = $request->input('topic_id');
        $content->user_id = auth()->id();
        $content->save();

        // Обработка изображений
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('public/project');

                $content->images()->create([
                    'path' => Storage::url($path),
                    'is_main' => ($index == $request->main_image_index),
                ]);
            }
        }

        return redirect()->route('admin.contents')->with('success', 'Contents created successfully.');
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
        $content = Content::find($id);

        return view('admin.contents.edit', compact('topics','content'));
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

        $content = Content::find($id);
        $content->sstm = $request->input('sstm');
        $content->title = $request->input('title');
        $content->content = $request->input('content');
        $content->topic_id = $request->input('topic_id');
        $content->save();

        return redirect()->route('admin.contents')->with('success', 'Content updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $content = Content::find($id);
        $content->delete();

        return redirect()->route('admin.contents')->with('success', 'News deleted successfully.');
    }
}
