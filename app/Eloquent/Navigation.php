<?php

namespace Copya\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;


class Navigation extends Model
{
    use Sluggable;
    //use SoftDeletes;
    use SluggableScopeHelpers;

    protected $table = 'navigations';
    protected $fillable = ['name', 'display_name'];

    public function sluggable()
    {
        return [
            'name' => [
                'source' => 'display_name'
            ]
        ];
    }

    public function menus()
    {
        return $this->belongsToMany('Copya\Eloquent\Menu')
            ->withPivot(['parent_id','name', 'url'])
            ->withTimestamps();
    }
}
