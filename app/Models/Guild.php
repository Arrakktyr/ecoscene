<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guild extends Model
{
    use HasFactory;

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
    
    public function images()
    {
        return $this->hasMany(GuildImage::class);
    }

    public function mainImage()
    {
        return $this->hasOne(GuildImage::class)->where('is_main', true);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
