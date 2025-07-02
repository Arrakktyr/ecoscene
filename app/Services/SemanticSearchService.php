<?php
namespace App\Services;

use App\Models\Podcast;
use TextAnalysis\Documents\TokensDocument;
use TextAnalysis\Tokenizers\GeneralTokenizer;

class SemanticSearchService
{
    /**
     * Найти похожие подкасты.
     *
     * @param string $query
     * @param int $limit
     * @return array
     */
    public function findSimilarPodcasts(string $query, int $limit = 200): array
    {
        // Инициализация токенизатора
        $tokenizer = new GeneralTokenizer();

        // Токенизация поискового запроса
        $queryTokens = array_unique($tokenizer->tokenize($query));

        $podcasts = Podcast::all(); // Получение всех записей
        $results = [];

        foreach ($podcasts as $podcast) {
            // Токенизация текста подкаста
            $contentTokens = array_unique($tokenizer->tokenize($podcast->content));

            // Вычисляем косинусное сходство
            $similarity = $this->cosineSimilarity($queryTokens, $contentTokens);

            $results[] = [
                'podcast' => $podcast,
                'similarity' => $similarity,
            ];
        }

        // Сортировка результатов
        usort($results, function ($a, $b) {
            return $b['similarity'] <=> $a['similarity'];
        });

        return array_slice($results, 0, $limit);
    }

    /**
     * Вычислить косинусное сходство между двумя наборами токенов.
     *
     * @param array $tokensA
     * @param array $tokensB
     * @return float
     */
    private function cosineSimilarity(array $tokensA, array $tokensB): float
    {
        $vectorA = array_count_values($tokensA);
        $vectorB = array_count_values($tokensB);

        $allTokens = array_unique(array_merge(array_keys($vectorA), array_keys($vectorB)));

        $dotProduct = 0;
        $magnitudeA = 0;
        $magnitudeB = 0;

        foreach ($allTokens as $token) {
            $valueA = $vectorA[$token] ?? 0;
            $valueB = $vectorB[$token] ?? 0;

            $dotProduct += $valueA * $valueB;
            $magnitudeA += $valueA ** 2;
            $magnitudeB += $valueB ** 2;
        }

        if ($magnitudeA == 0 || $magnitudeB == 0) {
            return 0; // Избегаем деления на ноль
        }

        return $dotProduct / (sqrt($magnitudeA) * sqrt($magnitudeB));
    }
}

