<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encyclopedia extends Model
{
    use HasFactory;

    protected $fillable = [
        'encyclopedia_category_id',
        'title',
        'image',
        'text',
        'slug',
    ];

    public function category()
    {
        return $this->belongsTo(EncyclopediaCategory::class, 'encyclopedia_category_id');
    }
    public function getImageAttribute($value)
    {
        if ($value != null) {
            return env('APP_URL') . 'storage/' . $value;
        } else {
            return null;
        }
    }
}
