<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Podcast extends Model
{
    use Searchable;
    use HasFactory;

    protected $fillable = ['title', 'content'];

    // Модифицируем как будет индексироваться запись
    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
            'tags' => json_decode($this->tags, true),
        ];
    }
}
