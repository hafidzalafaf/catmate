<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cat_id',
        'cat_mate_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cat()
    {
        return $this->belongsTo(Cat::class, 'cat_id', 'id');
    }

    public function catmate()
    {
        return $this->belongsTo(Cat::class, 'cat_mate_id', 'id');
    }
}
