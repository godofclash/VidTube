<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Events\ChildCreated;

class View extends Model
{
    use HasFactory;

    protected static function boot() {
        parent::boot();

        static::created(function ($child) {
            event(new ChildCreated($child));
        });
    }   

    protected $fillable = [
        'user_id', 
        'video_id'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function video() {
        return $this->belongsTo(Video::class, 'video_id');
    }
}
