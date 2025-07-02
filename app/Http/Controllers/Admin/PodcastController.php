<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Podcast;
use Illuminate\Http\Request;

class PodcastController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $podcasts = Podcast::all();

        return view('admin.podcasts.index', compact('podcasts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.podcasts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);

        $podcast = new Podcast();
        $podcast->title = $request->input('title');
        $podcast->content = $request->input('content');
        $podcast->link = $request->input('link');
        $podcast->save();

        return redirect()->route('admin.podcasts')->with('success', 'Podcast created successfully.');
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
    public function edit(string $id)    {

        $podcast = Podcast::find($id);
        return view('admin.podcasts.edit', compact('podcast'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);

        $podcast = Podcast::find($id);
        $podcast->title = $request->input('title');
        $podcast->content = $request->input('content');
        $podcast->link = $request->input('link');

        // Сохранение изображения, если файл был загружен
        if ($request->hasFile('image')) {
            // Удаление старого изображения, если оно есть
            if ($podcast->img && \Storage::disk('public')->exists($podcast->img)) {
                \Storage::disk('public')->delete($podcast->img);
            }

            // Сохранение нового изображения
            $path = $request->file('image')->store('images', 'public');
            $podcast->img = $path; // Обновляем поле в базе данных
        }


        $podcast->save();

        return redirect()->route('admin.podcasts')->with('success', 'Podcast updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $podcast = Podcast::find($id);
        $podcast->delete();

        return redirect()->route('admin.podcasts')->with('success', 'Podcast deleted successfully.');
    }
}
