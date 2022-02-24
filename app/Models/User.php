<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'email_verified_at',
        'password',
        'address',
        'no_wa',
        'is_admin',
        'level',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeNotAdmin($query)
    {
        return $query->where('is_admin', 0);
    }

    public function scopeByMonth($query, $month)
    {
        return $query->whereMonth('created_at', $month);
    }

    public function scopeThisYear($query)
    {
        return $query->whereYear('created_at', date('Y'));
    }

    public function Cats()
    {
        return $this->hasOne(Cat::class);
    }
    public function Bookmark()
    {
        return $this->hasMany(BookmarkEncyclopedia::class);
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
