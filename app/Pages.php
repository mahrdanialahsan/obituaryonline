<?php

namespace App;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    //
    protected $table    = 'pages';
    protected $fillable = ['title','short_description','slug','type','thumbnail_image','cover_image','description','status'];
    protected static function boot()
    {
        parent::boot();
        static::created(function ($page) {
            $page->slug = $page->generateSlug($page->title);
            $page->save();
        });
    }
    private function generateSlug($name)
    {
        if (static::whereSlug($slug = Str::slug($name))->exists()) {
            $max = static::whereTitle($name)->latest('id')->skip(1)->value('slug');
            if (isset($max[-1]) && is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }
        return $slug;
    }

}
