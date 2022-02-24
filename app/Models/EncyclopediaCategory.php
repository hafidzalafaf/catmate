<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EncyclopediaCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function encyclopedias()
    {
        return $this->hasMany(Encyclopedia::class, 'encyclopedia_category_id');
    }
}
