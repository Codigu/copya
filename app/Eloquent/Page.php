<?php

namespace Copya\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Page extends Model
{
    use Sluggable;
    use SoftDeletes;
    use SluggableScopeHelpers;

    protected $table = 'pages';
    protected $date = ['published_at', 'deleted_at'];
    protected $fillable = ['title', 'slug', 'content', 'published_at', 'user_id'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function menus()
    {
        return $this->morphMany('Copya\Eloquent\Menu', 'menuable');
    }

}
