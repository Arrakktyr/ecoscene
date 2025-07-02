<?php

namespace App\Http\Controllers;
use App\Models\News;
use App\Models\User;
use App\Models\Market;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class GeneralController extends Controller
{  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $news = \App\Models\News::select('id', 'sstm', 'title', 'content', 'created_at', 'user_id','topic_id')
        ->get()
        ->map(function ($item) {
            $item->source = 'news';
            return $item;
        });
        
        $academy = \App\Models\Academy::select('id', 'sstm', 'title', 'content', 'created_at', 'user_id','topic_id')
            ->get()
            ->map(function ($item) {
                $item->source = 'academy';
                return $item;
            });
        
        $project = \App\Models\Project::select('id', 'sstm', 'title', 'content', 'created_at', 'user_id','topic_id')
            ->get()
            ->map(function ($item) {
                $item->source = 'project';
                return $item;
            });
        
        $guild = \App\Models\Guild::select('id', 'sstm', 'title', 'content', 'created_at', 'user_id','topic_id')
            ->get()
            ->map(function ($item) {
                $item->source = 'guild';
                return $item;
            });
        
        $content = \App\Models\Content::select('id', 'sstm', 'title', 'content', 'created_at', 'user_id','topic_id')
            ->get()
            ->map(function ($item) {
                $item->source = 'content';
                return $item;
            });
        
        $market = \App\Models\Market::select('id', 'sstm', 'price', 'title', 'content', 'created_at', 'user_id','topic_id')
            ->get()
            ->map(function ($item) {
                $item->source = 'market';
                return $item;
            });
        
        // Объединение коллекций
        $allItems = collect()
            ->merge($news)
            ->merge($academy)
            ->merge($project)
            ->merge($guild)
            ->merge($content)
            ->merge($market);
        
        // Сортировка от новых к старым
        $sorted = $allItems->sortByDesc('created_at');

        $grouped = $sorted->groupBy(function ($item) {
            return $item->created_at->format('Y-m'); // например "2025-04"
        });
       
        
        return view('welcome', compact('grouped'));
    }

    public function news()
    {
        $news = \App\Models\News::select('id', 'sstm', 'title', 'content', 'created_at', 'user_id','topic_id')
        ->get()
        ->map(function ($item) {
            $item->source = 'news';
            return $item;
        });
        
        
        
        // Объединение коллекций
        $allItems = collect()
            ->merge($news);
        
        // Сортировка от новых к старым
        $sorted = $allItems->sortByDesc('created_at');

        $grouped = $sorted->groupBy(function ($item) {
            return $item->created_at->format('Y-m'); // например "2025-04"
        });
       
        $title = 'news';
        return view('welcome', compact('grouped','title'));
    }

    public function guilds()
    {
        $guilds = \App\Models\Guild::select('id', 'sstm', 'title', 'content', 'created_at', 'user_id','topic_id')
        ->get()
        ->map(function ($item) {
            $item->source = 'guild';
            return $item;
        });
        
        
        
        // Объединение коллекций
        $allItems = collect()
            ->merge($guilds);
        
        // Сортировка от новых к старым
        $sorted = $allItems->sortByDesc('created_at');

        $grouped = $sorted->groupBy(function ($item) {
            return $item->created_at->format('Y-m'); // например "2025-04"
        });
       
        
        $title = 'guilds';
        return view('welcome', compact('grouped','title'));
    }

    public function projects()
    {
        $projects = \App\Models\Project::select('id', 'sstm', 'title', 'content', 'created_at', 'user_id','topic_id')
        ->get()
        ->map(function ($item) {
            $item->source = 'project';
            return $item;
        });
        
        
        
        // Объединение коллекций
        $allItems = collect()
            ->merge($projects);
        
        // Сортировка от новых к старым
        $sorted = $allItems->sortByDesc('created_at');

        $grouped = $sorted->groupBy(function ($item) {
            return $item->created_at->format('Y-m'); // например "2025-04"
        });
       
        
        $title = 'projects';
        return view('welcome', compact('grouped','title'));
    }

    public function contents()
    {
        $contents = \App\Models\Content::select('id', 'title', 'sstm', 'content', 'created_at', 'user_id','topic_id')
        ->get()
        ->map(function ($item) {
            $item->source = 'content';
            return $item;
        });
        
        
        
        // Объединение коллекций
        $allItems = collect()
            ->merge($contents);
        
        // Сортировка от новых к старым
        $sorted = $allItems->sortByDesc('created_at');

        $grouped = $sorted->groupBy(function ($item) {
            return $item->created_at->format('Y-m'); // например "2025-04"
        });
       
        
        $title = 'contents';
        return view('welcome', compact('grouped','title'));
    }

    public function market()
    {
        $products = \App\Models\Market::select('id', 'title', 'sstm', 'price', 'content', 'created_at', 'user_id','topic_id')
        ->get()
        ->map(function ($item) {
            $item->source = 'market';
            return $item;
        });
        
        
        
        // Объединение коллекций
        $allItems = collect()
            ->merge($products);
        
        // Сортировка от новых к старым
        $sorted = $allItems->sortByDesc('created_at');

        $grouped = $sorted->groupBy(function ($item) {
            return $item->created_at->format('Y-m'); // например "2025-04"
        });
       
        
        $title = 'market';
        return view('welcome', compact('grouped','title'));
    }

    public function materials()
    {
        $materials = \App\Models\Academy::select('id', 'sstm', 'title', 'content', 'created_at', 'user_id','topic_id')
        ->get()
        ->map(function ($item) {
            $item->source = 'academy';
            return $item;
        });
        
        
        
        // Объединение коллекций
        $allItems = collect()
            ->merge($materials);
        
        // Сортировка от новых к старым
        $sorted = $allItems->sortByDesc('created_at');

        $grouped = $sorted->groupBy(function ($item) {
            return $item->created_at->format('Y-m'); // например "2025-04"
        });
       
        
        $title = 'academy';
        return view('welcome', compact('grouped','title'));
    }

    public function podcasts()
    {
        $podcasts = \App\Models\Podcast::select('id', 'title', 'content', 'created_at', 'user_id','topic_id')
        ->get()
        ->map(function ($item) {
            $item->source = 'podcast';
            return $item;
        });
        
        
        
        // Объединение коллекций
        $allItems = collect()
            ->merge($podcasts);
        
        // Сортировка от новых к старым
        $sorted = $allItems->sortByDesc('created_at');

        $grouped = $sorted->groupBy(function ($item) {
            return $item->created_at->format('Y-m'); // например "2025-04"
        });
       
        
        $title = 'podcasts';
        return view('welcome', compact('grouped','title'));
    }

    public function profile(Request $request){
        $user = User::find($request->id);
        // Проверка, найден ли пользователь
        if (!$user) {
            return response()->json(['message' => 'Пользователь не найден'], 404);
        }
        return view('profile', compact('user'));
    }
    public function company(Request $request){
        // $user = User::find($request->id);
        // // Проверка, найден ли пользователь
        // if (!$user) {
        //     return response()->json(['message' => 'Пользователь не найден'], 404);
        // }
        return view('company');
    }
}