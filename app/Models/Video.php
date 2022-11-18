<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
    use HasFactory,SoftDeletes;
    protected $table = "videoes";
    protected $fillable = ['category_id',
                            'user_type',
                            'title',
                            'upload_type',
                            'video',
                            'published_at',
                            'link', 
                            'description',
                             'hashtags',
                            'status',
                            'slug',
                            'thambuli',
                            ];

    // protected $casts =[
    //     'video' => 'array'
    // ];

    // public function setSlugAttribute()
    // {
    //     $this->attributes['slug'] = Str::slug($this->title, "-");
    // }


    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($question) {
    //         $question->slug = Str::slug($question->title);
    //     });
    // }

    // public function setTitleAttribute($value)
    // {
    //     $this->attributes['title'] = $value;
    //     $this->attributes['slug'] = Str::slug($value);
    // }

    public function getVideoAttribute($value)
    {        
        if($value)
        {
            return asset('/upload/'.$value);
        } 
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}




