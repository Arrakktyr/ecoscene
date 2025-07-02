<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id(); // Добавляет поле ID
            $table->string('title'); // Заголовок работы
            $table->text('description'); // Описание работы
            $table->string('location'); // Местоположение
            $table->date('start_date'); // Дата начала работы
            $table->timestamps(); // Стандартные временные метки created_at и updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
