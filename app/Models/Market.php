<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    use HasFactory;

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function images()
    {
        return $this->hasMany(MarketImage::class);
    }

    public function mainImage()
    {
        return $this->hasOne(MarketImage::class)->where('is_main', true);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
