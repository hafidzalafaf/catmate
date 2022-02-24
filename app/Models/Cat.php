<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Cat extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'breed',
        'age',
        'gender',
        'color',
        'bio',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function like()
    {
        return $this->hasMany(Like::class);
    }

    public function likesToCats()
    {
        return $this->belongsToMany(self::class, 'likes', 'cat_id', 'cat_mate_id');
    }

    public function likesFromCats()
    {
        return $this->belongsToMany(self::class, 'likes', 'cat_mate_id', 'cat_id');
    }

    public function matches()
    {
        return $this->likesFromCats()->whereIn('cat_id', $this->likesToCats()->pluck('cat_mate_id'));
    }


    public function getList()
    {
        // $cats = $this->all();
        return $this->likesToCats();
        // return $cats->whereIn('id' , $this->likesToCats()->pluck('cat_mate_id'));
        // return $this->all()->except('id', 4);
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
