<?php
namespace App\Services;

use NlpTools\Tokenizers\WhitespaceTokenizer;
use NlpTools\Stemmers\PorterStemmer;

class TextProcessingService
{
    protected $tokenizer;

    public function __construct()
    {
        // Используем токенизатор WhitespaceTokenizer
        $this->tokenizer = new WhitespaceTokenizer();
    }

    /**
     * Обработка текста для извлечения ключевых слов
     */
    public function extractKeywords($text)
    {
        // Токенизация текста
        $tokens = $this->tokenizer->tokenize($text);

        // Стемминг для приведения слов к корням
        $stemmer = new PorterStemmer();
        $stemmedTokens = array_map(function ($token) use ($stemmer) {
            return $stemmer->stem($token);
        }, $tokens);

        return $stemmedTokens;
    }
}
