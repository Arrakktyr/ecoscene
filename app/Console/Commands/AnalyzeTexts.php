<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Podcast;
use Illuminate\Support\Facades\DB;

class AnalyzeTexts extends Command
{
    protected $signature = 'analyze:texts';
    protected $description = 'Analyze podcasts texts and update categories';

    public function handle()
    {
        $this->info('Начинаем анализ...');

        set_time_limit(0); // убрать ограничение по времени выполнения

        $texts = Podcast::all(['id', 'content']);
        $file = storage_path('app/text_analyzer.json');
        file_put_contents($file, $texts->toJson());

        //$pythonPath = base_path('venv/Scripts/python.exe'); // под Windows, под Linux можно 'python3'
        $pythonPath = base_path('/usr/bin/python3'); //под linux
        $scriptPath = base_path('scripts/text_analyzer.py');

        $cmd = escapeshellcmd("$pythonPath $scriptPath \"$file\"");

        $output = [];
        $returnVar = 0;
        exec($cmd . " 2>&1", $output, $returnVar);

        if ($returnVar !== 0) {
            $this->error('Ошибка выполнения Python скрипта:');
            $this->error(implode("\n", $output));
            return 1;
        }

        $jsonString = implode("\n", $output);
        $results = json_decode($jsonString, true);

        if (is_null($results)) {
            $this->error('Ошибка декодирования JSON из Python');
            $this->error(implode("\n", $output));
            return 1;
        }

        DB::table('category_text')->truncate();

        foreach ($results as $res) {
            if (!isset($res['id'], $res['label'])) {
                continue;
            }
            $categoryId = $res['label'] + 1;
            DB::table('category_text')->insert([
                'text_id' => $res['id'],
                'category_id' => $categoryId,
                'relevance' => 1.0,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $this->info('Анализ завершен успешно.');

        return 0;
    }
}
