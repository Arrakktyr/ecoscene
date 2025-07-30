<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Podcast;
use Illuminate\Support\Facades\DB;

class TextController extends Controller
{
    public function analyzeTexts()
{
    // 1. Получаем данные из базы
    $texts = Podcast::all(['id', 'content']);
    $file = storage_path('app/text_analyzer.json');
    
    // 2. Записываем JSON с текстами в файл
    file_put_contents($file, $texts->toJson());

    // 3. Подготавливаем путь к python и скрипту
    // Замените python3 на абсолютный путь к python, если нужно
    //$pythonPath = base_path('venv/Scripts/python.exe'); // для Windows, иначе 'python3' для Linux/Mac
    $pythonPath = base_path('venv/bin/python'); //под linux
    
    $scriptPath = base_path('scripts/text_analyzer.py');

    // 4. Формируем команду, экранируем аргументы
    $cmd = escapeshellcmd("$pythonPath $scriptPath \"$file\"");

    // 5. Выполняем команду
    $output = [];
    $returnVar = 0;
    exec($cmd . " 2>&1", $output, $returnVar);

    // 6. Проверяем успешность запуска
    if ($returnVar !== 0) {
        return response()->json([
            'error' => 'Ошибка выполнения Python скрипта',
            'output' => $output
        ], 500);
    }

    // 7. Парсим вывод — скрипт должен выводить валидный JSON
    $jsonString = implode("\n", $output);
    $results = json_decode($jsonString, true);

    if (is_null($results)) {
        return response()->json(['error' => 'Ошибка декодирования JSON из Python', 'output' => $output], 500);
    }

    // 8. Чтобы не дублировать, например, очищаем таблицу
    DB::table('category_text')->truncate();

    // 9. Вставляем результаты в БД
    foreach ($results as $res) {
        // Проверяем нужные ключи в $res
        if (!isset($res['id'], $res['label'])) {
            continue;
        }
        $categoryId = $res['label'] + 1; // если категория с 1, а не с 0
        DB::table('category_text')->insert([
            'text_id' => $res['id'],
            'category_id' => $categoryId,
            'relevance' => 1.0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    return response()->json(['status' => 'analyzed']);
}

    public function search(Request $request)
    {
        $query = $request->input('q');
        $texts = Podcast::all(['id', 'content']);
        $file = storage_path('app/texts_query.json');
        file_put_contents($file, $texts->toJson());

        $output = [];
        $returnVar = null;
        $escapedQuery = escapeshellarg($query);

        // Полный путь до python.exe в виртуальном окружении
        //$python = base_path('venv/Scripts/python.exe');
        $python = base_path('venv/bin/python'); //под linux

        // Полный путь до скрипта
        $script = base_path('scripts/match_query.py');

        // Команда с перенаправлением ошибок в вывод
        $cmd = "\"$python\" \"$script\" \"$file\" $escapedQuery 2>&1";

        exec($cmd, $output, $returnVar);

        // Если есть ошибки, вывести их
        if ($returnVar !== 0) {
            return response()->json([
                'error' => 'Ошибка выполнения Python скрипта',
                'output' => $output
            ], 500);
        }

        $results = json_decode(implode("", $output), true);

        if (!is_array($results)) {
            return response()->json([
                'error' => 'Неверный формат ответа Python скрипта',
                'output' => $output
            ], 500);
        }

        usort($results, fn($a, $b) => $b['score'] <=> $a['score']);
        $ids = array_column($results, 'id');
        $ordered = implode(',', $ids);

        $podcasts = Podcast::whereIn('id', $ids)
        ->orderByRaw("FIELD(id, $ordered)")
        ->take(15)
        ->get()
        ->toArray();

        // return response()->json($texts);

         // Возвращаем результаты в представление
        return view('podcasts.index', compact('podcasts','query'));
    }
}