<?php

namespace App\Console\Commands;

use App\Models\Podcast;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\DomCrawler\Crawler;


class ParseWebsite extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:website';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse data from a website and save it to the database with images';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $client = new \GuzzleHttp\Client([
            'verify' => false, // Отключает проверку сертификата
        ]);
        $url = 'https://yonearth.org/community-podcast/'; // Замените на URL сайта
        $this->info("Fetching data from: $url");

        try {
            $response = $client->get($url);
            $html = $response->getBody()->getContents();

            $crawler = new Crawler($html);

            // Пример: получение заголовков и изображений
            $crawler->filter('.tve-article-cover')->each(function (Crawler $node) use ($client) {
                $title = $node->filter('a.tcb-article-cover-link')->text();
                $link = $node->filter('a.tcb-article-cover-link')->attr('href');
                //$imageUrl = $node->filter('img')->attr('src'); // Путь к изображению

                $this->info("Title: $title, Link: $link");

                // Скачивание и сохранение изображения
                //$imagePath = $this->saveImage($client, $imageUrl);

                // Сохранение данных в базу
                $searchTitle = explode(' –', $title)[0]; // Получаем подстроку до первого "-"
                echo $searchTitle;
                    // Ищем точное совпадение
                $podcast = Podcast::where('title', trim($searchTitle))->first();

                if ($podcast) {
                    echo "Podcast found: " . $podcast->title;
                    $podcast->link = $link;
                    $podcast->title = $title;

                    $podcast->save();
                }


            });

            $this->info("Data parsing completed successfully!");
        } catch (\Exception $e) {
            $this->error("Error: " . $e->getMessage());
        }
    }

    /**
     * Скачивание и сохранение изображения.
     */
    private function saveImage(Client $client, $url)
    {
        try {
            $response = $client->get($url, ['stream' => true]);

            // Создаем уникальное имя файла
            $filename = 'images/' . uniqid() . '.' . pathinfo($url, PATHINFO_EXTENSION);

            // Сохраняем файл в хранилище Laravel (storage/app/public)
            Storage::disk('public')->put($filename, $response->getBody()->getContents());

            return $filename; // Возвращаем путь к изображению
        } catch (\Exception $e) {
            $this->error("Failed to save image: " . $e->getMessage());
            return null;
        }
    }
}
