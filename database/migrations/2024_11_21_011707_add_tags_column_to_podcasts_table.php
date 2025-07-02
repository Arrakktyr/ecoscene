<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('podcasts', function (Blueprint $table) {
            $table->json('tags')->nullable(); // Хранение тегов в формате JSON
        });
    }

    public function down()
    {
        Schema::table('podcasts', function (Blueprint $table) {
            $table->dropColumn('tags');
        });
    }
};
