<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'post_category_id',
        'title',
        'slug',
        'content',
        'featured_image',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'status',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

     public function getPublishedAtFormattedAttribute()
    {
        if (! $this->published_at) {
            return '-';
        }

        // published_at sudah dicast ke Carbon karena $casts di atas,
        // tapi parse juga aman jika masih string.
        return Carbon::parse($this->published_at)->format('d M Y');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(PostCategory::class, 'post_category_id');
    }

    public function images() {
        return $this->hasMany(PostImage::class);
    }
}
