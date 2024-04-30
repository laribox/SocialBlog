<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'body',
        'user_id',
        'image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeSearch(Builder $query , string $search){

        return $query->where('title', 'like', '%'.$search.'%')->orWhere('body', 'like', '%'.$search.'%');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


}
