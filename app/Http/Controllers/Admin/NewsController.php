<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::with('topic')->where('user_id', auth()->id())->get();
        return view('admin.news.index', compact('news'));
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
            'content' => 'required',
            'topic_id' => 'required|exists:topics,id',
            'images.*' => 'image|max:2048',
            'main_image_index' => 'nullable|integer|min:0',
        ]);

        $news = new News();
        $news->sstm = $request->input('sstm');
        $news->title = $request->input('title');
        $news->content = $request->input('content');
        $news->topic_id = $request->input('topic_id');
        $news->user_id = auth()->id();
        $news->save();

        // Обработка изображений
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('public/news');

                $news->images()->create([
                    'path' => Storage::url($path),
                    'is_main' => ($index == $request->main_image_index),
                ]);
            }
        }

        return redirect()->route('admin.news')->with('success', 'News created successfully.');
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
        $news = News::find($id);

        return view('admin.news.edit', compact('topics','news'));
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

        $news = News::find($id);
        $news->sstm = $request->input('sstm');
        $news->title = $request->input('title');
        $news->content = $request->input('content');
        $news->topic_id = $request->input('topic_id');
        $news->save();

        return redirect()->route('admin.news')->with('success', 'News updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = News::find($id);
        $news->delete();

        return redirect()->route('admin.news')->with('success', 'News deleted successfully.');
    }
}
