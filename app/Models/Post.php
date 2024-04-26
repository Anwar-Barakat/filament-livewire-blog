<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'image',
        'body',
        'published_at',
        'featured',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function getImageAttribute($value)
    {
        if (str_starts_with($value, 'https://')) {
            return $value;
        } else {
            return url('storage/' . $value);
        }
    }

    public function getReadingTime()
    {
        $minutes = round(str_word_count($this) / 250);
        return ($minutes > 1) ? 1 : $minutes;
    }

    public function getExcerpt()
    {
        return Str::limit(strip_tags($this->body), 150);
    }

    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', Carbon::now());
    }


    public function scopeWithCategories($query, string $category)
    {
        $query->whereHas('categories', fn ($q)  => $q->where('slug', $category));
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    public function scopePopular($query)
    {
        return $query->withCount('likes')->orderBy('likes_count', 'desc');
    }

    public function scopeSearch($query, $search = '')
    {
        return $query->where('title', 'like', "%{$search}%");
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function likes(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'post_like')->withTimestamps();
    }
}
