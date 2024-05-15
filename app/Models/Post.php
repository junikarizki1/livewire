<?php

namespace App\Models;

use Illuminate\Contracts\Cache\Store;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    use softDeletes;
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'image',
        'body',
        'published_at',
        'featured',
    ];

    // start menampilkan author, kayaknya nanti bikin database yg ada authornya lebih mudah
    protected $casts = [
        'published_at' => 'datetime',
    ];
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    // end menampilkan author
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }

    public function scopeFeatured($query)
    {
        $query->where('featured', true);
    }


    // fungsi untuk membatasi berapa kata yg tampil di artikel sebelum klik read more
    public function getExcerpt()
    {
        return Str::limit(strip_tags($this->body), '150');
    }
    // fungsi untuk memperkirakan berapa menit membaca artikel
    public function getReadingTime()
    {
        $mins = round(str_word_count($this->body) / 250);
        return ($mins < 1) ? 1 : $mins;
    }
    //fungsi untuk menampilkan thumbnail dengan segala tipe gambar
    public function getThumbnailImage()
    {
        $isUrl = str_contains($this->image, 'http');
        return ($isUrl) ? $this->image : Storage::disk('public')->url($this->image);
    }
}
