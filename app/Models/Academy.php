<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academy extends Model
{
    use HasFactory;

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function images()
    {
        return $this->hasMany(AcademyImage::class);
    }

    public function mainImage()
    {
        return $this->hasOne(AcademyImage::class)->where('is_main', true);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
