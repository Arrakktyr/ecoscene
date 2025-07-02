<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use Illuminate\Http\Request;
use App\Services\SemanticSearchService;

class PodcastController extends Controller
{

    protected $searchService;

    public function __construct()
    {
        $this->searchService = new SemanticSearchService();
    }

    public function search(Request $request)
    {
        $query = $request->input('q');
        if(isset($query) == false){
            $query = 'Ecology';
        }

        $results = $this->searchService->findSimilarPodcasts($query);

        $tags = $this->cloud();

        // Возвращаем результаты в представление
        return view('podcasts.index', compact('results','query','tags'));
    }
    public function getSimilarityScore(string $query, string $podcastContent): float
    {
        // Используем OpenAI для создания ответа
        $response = OpenAI::chat()->create([
            'model' => 'text-davinci-003',
            'prompt' => "How similar is the following text to this: '$query'? Compare to: '$podcastContent'",
            'max_tokens' => 100,
        ]);

        // Извлекаем текст с оценкой сходства
        $similarityScore = $response['choices'][0]['text'] ?? '0';

        return (float) trim($similarityScore);  // Возвращаем сходство как число
    }

    public function cloud()
    {

        $tags = [];
        $podcasts = Podcast::all(); // Получаем все подкасты

        foreach ($podcasts as $podcast) {
            $tagList = json_decode($podcast->tags); // Разделяем теги через запятую

            foreach ($tagList as $tag => $k) {

                $tag = strtolower(trim($tag));

                    if (isset($tags[$tag])) {
                        $tags[$tag]++;
                    } else {
                        $tags[$tag] = 1;
                    }

            }
        }

    // Теперь $tags содержит массив с тегами и их частотами
    return $tags;
    }
}


