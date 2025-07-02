<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Podcast;
use PhpOffice\PhpWord\IOFactory;
use Illuminate\Support\Facades\Log;

class ImportPodcasts extends Command
{
    protected $signature = 'import:podcasts {folder}';
    protected $description = 'Import podcast titles and content from .txt and .docx files into the database';

    public function handle()
    {
        $folder = $this->argument('folder');

        if (!is_dir($folder)) {
            $this->error("The folder {$folder} does not exist.");
            return;
        }

        $files = array_filter(scandir($folder), function ($file) use ($folder) {
            return in_array(pathinfo($file, PATHINFO_EXTENSION), ['txt', 'docx']);
        });

        foreach ($files as $file) {
            $filePath = "{$folder}/{$file}";
            $extension = pathinfo($file, PATHINFO_EXTENSION);
            $title = pathinfo($file, PATHINFO_FILENAME);

            // Проверяем, есть ли запись с таким же названием в базе
            if (Podcast::where('title', $title)->exists()) {
                $this->info("Skipped (already exists): {$title}");
                continue;
            }

            try {
                // Читаем содержимое файла
                if ($extension === 'txt') {
                    $content = file_get_contents($filePath);
                } elseif ($extension === 'docx') {
                    $content = $this->readDocx($filePath);
                } else {
                    continue;
                }

                // Создаем запись в базе
                Podcast::create([
                    'title' => $title,
                    'content' => $content,
                ]);

                $this->info("Imported: {$title}");
            } catch (\Exception $e) {
                // Логируем ошибки
                Log::error("Failed to import {$file}: {$e->getMessage()}");
                $this->error("Failed to import {$file}: {$e->getMessage()}");
            }
        }
    }

    private function readDocx($filePath)
    {
        $phpWord = IOFactory::load($filePath);
        $text = '';

        foreach ($phpWord->getSections() as $section) {
            foreach ($section->getElements() as $element) {
                if (method_exists($element, 'getText')) {
                    $text .= $element->getText() . "\n";
                }
            }
        }

        return $text;
    }
}



