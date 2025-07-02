<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuildImage extends Model
{
    use HasFactory;

    protected $fillable = ['market_id', 'path', 'is_main'];

    public function guild()
    {
        return $this->belongsTo(Guild::class);
    }
}
