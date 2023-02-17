<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ProjectCategory extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable=['title'];
    protected $fillable=['title'];

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
