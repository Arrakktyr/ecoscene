<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademyImage extends Model
{
    use HasFactory;

    protected $fillable = ['market_id', 'path', 'is_main'];

    public function academy()
    {
        return $this->belongsTo(Academy::class);
    }
}
