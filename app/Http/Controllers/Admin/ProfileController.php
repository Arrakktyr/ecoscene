<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $topics = Topic::all();
        return view('admin.profile.index', compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.topics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255'
        ]);

        $topic = new Topic();
        $topic->title = $request->input('title');
        $topic->save();

        return redirect()->route('admin.topics')->with('success', 'Topic created successfully.');
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
        $topic =  Topic::find($id);

        return view('admin.topics.edit', compact('topic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255'
        ]);

        $topic = Topic::find($id);
        $topic->title = $request->input('title');
        $topic->save();

        return redirect()->route('admin.topics')->with('success', 'Topic updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $topic = Topic::find($id);
        $topic->delete();
        return redirect()->route('admin.topics')->with('success', 'Topic deleted successfully.');
    }

    public function updatePhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|max:2048',
        ]);

        $user = auth()->user();

        if ($request->hasFile('photo')) {
            // Удалим старое фото, если нужно
            if ($user->photo && Storage::exists(str_replace('storage/', 'public/', $user->photo))) {
                Storage::delete(str_replace('storage/', 'public/', $user->photo));
            }

            $path = $request->file('photo')->store('public/photos');
            $publicPath = Storage::url($path); // Получаем путь для отображения в браузере

            // Сохраняем путь в БД
            $user->photo = $publicPath;
            $user->save();

            return response()->json([
                'success' => true,
                'photo_url' => asset($publicPath),
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Файл не был загружен',
        ], 400);
    }

    public function updateStatus(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $user->status = $request->message;
        $user->save();
        
        return response()->json(['message' => 'Статус сохранён']);
    }

}
