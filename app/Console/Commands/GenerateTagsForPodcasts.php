<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Podcast;
use NlpTools\Tokenizers\WhitespaceTokenizer;

class GenerateTagsForPodcasts extends Command
{
    protected $signature = 'podcasts:generate-tags';
    protected $description = 'Generate tags for all podcasts based on their content';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $podcasts = Podcast::all();
        $allTags = [];

        foreach ($podcasts as $podcast) {
            $content = $podcast->content;

            // Извлекаем существительные из контента
            $tags = $this->extractNouns($content);

            // Добавляем теги в общий массив
            foreach ($tags as $tag) {
                if (isset($allTags[$tag])) {
                    $allTags[$tag]++;
                } else {
                    $allTags[$tag] = 1;
                }
            }

            // Сортировка тегов по частоте
            arsort($allTags);

            // Ограничиваем количество тегов (например, максимум 10)
            $allTags = array_slice($allTags, 0, 200);

            // Сохраняем теги в базе данных подкаста
            $podcast->tags = json_encode($allTags);
            $podcast->save();
        }

        $this->info('Tags have been generated for all podcasts.');
    }

    public function sanitizeTag($tag) {
        // Удаляем спецсимволы, оставляем только буквы и цифры
        $tag = preg_replace('/[^a-zA-Z]/', '', $tag);

        // Проверка на длину тега (должен быть не менее 3 символов)
        if (strlen($tag) < 3) {
            return null; // Если длина тега меньше 3 символов, возвращаем null
        }

        // Проверяем, не содержит ли тег цифры
        if (preg_match('/\d/', $tag)) {
            return null; // Если тег содержит цифры, возвращаем null
        }

        return strtolower($tag); // Приводим тег к нижнему регистру
    }

    public function extractNouns($text) {
        $stopWords = [
            'are', 'have', 'share', 'welcome', 'were', 'was', 'thats', 'its',
            'the', 'a', 'an', 'in', 'on', 'at', 'for', 'with', 'by',
            'of', 'and', 'but', 'or', 'as', 'to', 'from', 'up', 'down',
            'over', 'under', 'between', 'through', 'above', 'below', 'not',
            'i', 'you', 'he', 'she', 'it', 'we', 'they', 'me', 'us', 'him',
            'her', 'them', 'my', 'your', 'his', 'her', 'its', 'our', 'their',
            'who', 'whom', 'which', 'this', 'that', 'these', 'those', 'it’s',
            'here', 'there', 'all', 'any', 'each', 'some', 'few', 'every', 'one',
            'two', 'three', 'a', 'an', 'how', 'why', 'where', 'when'
        ];

        // Создаем экземпляр токенизатора
        $tokenizer = new WhitespaceTokenizer();
        $tokens = $tokenizer->tokenize($text);

        // Применяем фильтрацию существительных и стоп-слов
        $nouns = [];
        foreach ($tokens as $token) {
            // Простая фильтрация: считаем, что существительные заканчиваются на 's' или 'e'
            if (preg_match('/(s|e)$/', $token) && !in_array(strtolower($token), $stopWords)) {
                // Санитизация и фильтрация тегов
                $sanitizedToken = $this->sanitizeTag($token);
                if ($sanitizedToken) {
                    $nouns[] = $sanitizedToken;
                }
            }
        }

        return $nouns;
    }
}
