<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Post extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable=['title','category_id','short_desc','body','slug','views','date','status','author','cover'];
    protected $translatable=['title','short_desc','body'];

    public function category()
    {
        return $this->belongsTo(Pcategory::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
