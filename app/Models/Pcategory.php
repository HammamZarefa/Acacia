<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Pcategory extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $fillable=['title','desc','slug'];
    protected $translatable=['title','desc'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
