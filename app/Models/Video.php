<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'description', 
        'video', 
        'thumbnail', 
        'user_id', 
        'views'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function likes() {
        return $this->hasMany(Like::class, 'video_id');
    }

    public function views() {
        return $this->hasMany(View::class, 'video_id');
    }
}
