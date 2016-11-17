<?php

namespace Copya\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;


class Form extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;

    protected $table = 'forms';
    protected $fillable = ['display_name'];

    public function sluggable()
    {
        return [
            'name' => [
                'source' => 'display_name'
            ]
        ];
    }

    public function fields()
    {
        return $this->belongsToMany(\Copya\Eloquent\Field::class);
    }

}
