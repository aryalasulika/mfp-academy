<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory;
    protected $table = 'events';
    protected $fillable = [
        'judul',
        'slug',
        'kategori',
        'deskripsi',
        'tanggal',
        'lokasi',
        'image',
    ];

    /**
     * Boot the model and automatically generate slug from judul
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($event) {
            if (empty($event->slug)) {
                $event->slug = static::generateUniqueSlug($event->judul);
            }
        });

        static::updating(function ($event) {
            if ($event->isDirty('judul') && empty($event->slug)) {
                $event->slug = static::generateUniqueSlug($event->judul);
            }
        });
    }

    /**
     * Generate unique slug from title
     */
    public static function generateUniqueSlug($title)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $counter = 1;

        while (static::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    /**
     * Get route key name for model binding
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get the URL for this event
     */
    public function getUrlAttribute()
    {
        return route('event.show', $this->slug);
    }
}
