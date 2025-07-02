<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('category_podcast', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('category_id');
    $table->unsignedBigInteger('podcast_id');

    $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
    $table->foreign('podcast_id')->references('id')->on('podcasts')->onDelete('cascade');
});
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};