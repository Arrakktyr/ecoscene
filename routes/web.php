<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PodcastController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\TextController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear'); // Очистить кэш
    Artisan::call('config:clear'); // Очистить конфигурационный кэш
    Artisan::call('route:clear'); // Очистить кэш маршрутов
    Artisan::call('view:clear'); // Очистить кэш представлений

    return 'Cache cleared successfully!'; // Сообщение после выполнения команды
});

Route::get('/', [App\Http\Controllers\GeneralController::class, 'index'])->name('general');
Route::get('/news', [App\Http\Controllers\GeneralController::class, 'news'])->name('news');
Route::get('/guilds', [App\Http\Controllers\GeneralController::class, 'guilds'])->name('guilds');
Route::get('/projects', [App\Http\Controllers\GeneralController::class, 'projects'])->name('projects');
Route::get('/contents', [App\Http\Controllers\GeneralController::class, 'contents'])->name('contents');
Route::get('/market', [App\Http\Controllers\GeneralController::class, 'market'])->name('market');
Route::get('/materials', [App\Http\Controllers\GeneralController::class, 'materials'])->name('materials');
Route::get('/podcasts', [App\Http\Controllers\GeneralController::class, 'podcasts'])->name('podcasts');
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('/profile/{id}', [App\Http\Controllers\GeneralController::class, 'profile'])->name('user.profile');
Route::get('/company', [App\Http\Controllers\GeneralController::class, 'company'])->name('company');
Route::get('/podcasts/search', [PodcastController::class, 'search'])->name('podcasts.search');
Route::get('/analyze', [TextController::class, 'analyzeTexts']);
Route::get('/search', [TextController::class, 'search']);


Auth::routes();

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
    Route::get('/profile', [App\Http\Controllers\Admin\ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/photo/', [App\Http\Controllers\Admin\ProfileController::class, 'updatePhoto'])->name('profile.photo.update');
    Route::post('/profile/status/', [App\Http\Controllers\Admin\ProfileController::class, 'updateStatus'])->name('profile.status.update');

    Route::get('/news', [App\Http\Controllers\Admin\NewsController::class, 'index'])->name('news');
    Route::get('/news/create/', [App\Http\Controllers\Admin\NewsController::class, 'create'])->name('news.create');
    Route::get('/news/edit/{id}', [App\Http\Controllers\Admin\NewsController::class, 'edit'])->name('news.edit');
    Route::post('/news/store/', [App\Http\Controllers\Admin\NewsController::class, 'store'])->name('news.store');
    Route::post('/news/update/{id}', [App\Http\Controllers\Admin\NewsController::class, 'update'])->name('news.update');
    Route::post('/news/destroy/{id}', [App\Http\Controllers\Admin\NewsController::class, 'destroy'])->name('news.destroy');

    Route::get('/topics', [App\Http\Controllers\Admin\TopicController::class, 'index'])->name('topics');
    Route::get('/topic/create/', [App\Http\Controllers\Admin\TopicController::class, 'create'])->name('topic.create');
    Route::get('/topic/edit/{id}', [App\Http\Controllers\Admin\TopicController::class, 'edit'])->name('topic.edit');
    Route::post('/topic/store/', [App\Http\Controllers\Admin\TopicController::class, 'store'])->name('topic.store');
    Route::post('/topic/update/{id}', [App\Http\Controllers\Admin\TopicController::class, 'update'])->name('topic.update');
    Route::post('/topic/destroy/{id}', [App\Http\Controllers\Admin\TopicController::class, 'destroy'])->name('topic.destroy');

    Route::get('/guilds', [App\Http\Controllers\Admin\GuildController::class, 'index'])->name('guilds');
    Route::get('/guild/create/', [App\Http\Controllers\Admin\GuildController::class, 'create'])->name('guild.create');
    Route::get('/guild/edit/{id}', [App\Http\Controllers\Admin\GuildController::class, 'edit'])->name('guild.edit');
    Route::post('/guild/store/', [App\Http\Controllers\Admin\GuildController::class, 'store'])->name('guild.store');
    Route::post('/guild/update/{id}', [App\Http\Controllers\Admin\GuildController::class, 'update'])->name('guild.update');
    Route::post('/guild/destroy/{id}', [App\Http\Controllers\Admin\GuildController::class, 'destroy'])->name('guild.destroy');

    Route::get('/projects', [App\Http\Controllers\Admin\ProjectController::class, 'index'])->name('projects');
    Route::get('/project/create/', [App\Http\Controllers\Admin\ProjectController::class, 'create'])->name('project.create');
    Route::get('/project/edit/{id}', [App\Http\Controllers\Admin\ProjectController::class, 'edit'])->name('project.edit');
    Route::post('/project/store/', [App\Http\Controllers\Admin\ProjectController::class, 'store'])->name('project.store');
    Route::post('/project/update/{id}', [App\Http\Controllers\Admin\ProjectController::class, 'update'])->name('project.update');
    Route::post('/project/destroy/{id}', [App\Http\Controllers\Admin\ProjectController::class, 'destroy'])->name('project.destroy');

    Route::get('/contents', [App\Http\Controllers\Admin\ContentController::class, 'index'])->name('contents');
    Route::get('/content/create/', [App\Http\Controllers\Admin\ContentController::class, 'create'])->name('content.create');
    Route::get('/content/edit/{id}', [App\Http\Controllers\Admin\ContentController::class, 'edit'])->name('content.edit');
    Route::post('/content/store/', [App\Http\Controllers\Admin\ContentController::class, 'store'])->name('content.store');
    Route::post('/content/update/{id}', [App\Http\Controllers\Admin\ContentController::class, 'update'])->name('content.update');
    Route::post('/content/destroy/{id}', [App\Http\Controllers\Admin\ContentController::class, 'destroy'])->name('content.destroy');

    Route::get('/materials', [App\Http\Controllers\Admin\AcademyController::class, 'index'])->name('materials');
    Route::get('/material/create/', [App\Http\Controllers\Admin\AcademyController::class, 'create'])->name('material.create');
    Route::get('/material/edit/{id}', [App\Http\Controllers\Admin\AcademyController::class, 'edit'])->name('material.edit');
    Route::post('/material/store/', [App\Http\Controllers\Admin\AcademyController::class, 'store'])->name('material.store');
    Route::post('/material/update/{id}', [App\Http\Controllers\Admin\AcademyController::class, 'update'])->name('material.update');
    Route::post('/material/destroy/{id}', [App\Http\Controllers\Admin\AcademyController::class, 'destroy'])->name('material.destroy');


    Route::get('/markets', [App\Http\Controllers\Admin\MarketController::class, 'index'])->name('markets');
    Route::get('/market/create/', [App\Http\Controllers\Admin\MarketController::class, 'create'])->name('market.create');
    Route::get('/market/edit/{id}', [App\Http\Controllers\Admin\MarketController::class, 'edit'])->name('market.edit');
    Route::post('/market/store/', [App\Http\Controllers\Admin\MarketController::class, 'store'])->name('market.store');
    Route::post('/market/update/{id}', [App\Http\Controllers\Admin\MarketController::class, 'update'])->name('market.update');
    Route::post('/market/destroy/{id}', [App\Http\Controllers\Admin\MarketController::class, 'destroy'])->name('market.destroy');

    Route::get('/podcasts', [App\Http\Controllers\Admin\PodcastController::class, 'index'])->name('podcasts');
    Route::get('/podcast/create/', [App\Http\Controllers\Admin\PodcastController::class, 'create'])->name('podcast.create');
    Route::get('/podcast/edit/{id}', [App\Http\Controllers\Admin\PodcastController::class, 'edit'])->name('podcast.edit');
    Route::post('/podcast/store/', [App\Http\Controllers\Admin\PodcastController::class, 'store'])->name('podcast.store');
    Route::post('/podcast/update/{id}', [App\Http\Controllers\Admin\PodcastController::class, 'update'])->name('podcast.update');
    Route::post('/podcast/destroy/{id}', [App\Http\Controllers\Admin\PodcastController::class, 'destroy'])->name('podcast.destroy');

    Route::get('/meet', [App\Http\Controllers\Admin\GoogleMeetController::class, 'index'])->name('meet.index');
    Route::get('/meet/create', [App\Http\Controllers\Admin\GoogleMeetController::class, 'create'])->name('meet.create');
    Route::post('/meet', [App\Http\Controllers\Admin\GoogleMeetController::class, 'store'])->name('meet.store');
    Route::get('/meet/{id}/edit', [App\Http\Controllers\Admin\GoogleMeetController::class, 'edit'])->name('meet.edit');
    Route::put('/meet/{id}', [App\Http\Controllers\Admin\GoogleMeetController::class, 'update'])->name('meet.update');
    Route::delete('/meet/{id}', [App\Http\Controllers\Admin\GoogleMeetController::class, 'destroy'])->name('meet.destroy');

});
