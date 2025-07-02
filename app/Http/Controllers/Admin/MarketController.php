<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Market;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MarketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
$markets = Market::with('topic')->where('user_id', auth()->id())->get();
        return view('admin.markets.index', compact('markets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $topics = Topic::all();
        return view('admin.markets.create',compact('topics'));
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

        $market = new Market();
        $market->sstm = $request->input('sstm');
        $market->title = $request->input('title');
        $market->content = $request->input('content');
        $market->price = $request->input('price');
        $market->topic_id = $request->input('topic_id');
        $market->user_id = auth()->id();
        $market->save();

        // Обработка изображений
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('public/market');

                $market->images()->create([
                    'path' => Storage::url($path),
                    'is_main' => ($index == $request->main_image_index),
                ]);
            }
        }

        return redirect()->route('admin.markets')->with('success', 'Market created successfully.');
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
        $topics = Topic::all();
        $market = Market::find($id);

        return view('admin.markets.edit', compact('topics','market'));
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

        $market = Market::find($id);
        $market->sstm = $request->input('sstm');
        $market->title = $request->input('title');
        $market->content = $request->input('content');
        $market->price = $request->input('price');
        $market->topic_id = $request->input('topic_id');
        $market->save();

        return redirect()->route('admin.markets')->with('success', 'Market updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $market = Market::find($id);
        $market->delete();

        return redirect()->route('admin.markets')->with('success', 'Market deleted successfully.');
    }
}
