<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookmarkEncyclopedia extends Model
{
    use HasFactory;

    protected $fillable = [
        'encyclopedia_id', 'user_id'
    ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
    public function encyclopedia()
    {
        return $this->belongsTo(Encyclopedia::class);
    }


}
