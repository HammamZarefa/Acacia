<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Translatable\HasTranslations;

class Project extends Model
{
    use HasFactory;
    use HasTranslations;
    use SoftDeletes;
    protected $fillable = ['title', 'summry', 'desc', 'link', 'location', 'status', 'order_date', 'released_date', 'client'];
    public $translatable = ['title', 'summry','summary', 'desc', 'location', 'status'];

    public function projectCategories()
    {
        return $this->belongsToMany(ProjectCategory::class,'project_category_project');
    }

    public function images()
    {
        return $this->morphMany('App\Models\Image','imageable');
    }
    public function projectMainCategory()
    {
        return $this->belongsToMany(ProjectCategory::class,'project_category_project')->where('project_categories.is_main',true);
    }
}
