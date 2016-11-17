<?php

namespace Copya\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;


class Field extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;

    protected $table = 'fields';
    protected $fillable = ['display_name'];

    public function sluggable()
    {
        return [
            'name' => [
                'source' => 'display_name'
            ]
        ];
    }


}
