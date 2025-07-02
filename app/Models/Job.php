<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    // Укажите, если хотите использовать кастомные имена таблиц или других полей
    protected $table = 'jobs';

    // Укажите поля, которые могут быть заполнены
    protected $fillable = [
        'title',
        'description',
        'company',
        'location',
        'start_date',
    ];
}
