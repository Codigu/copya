<?php

namespace Copya\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';
    protected $fillable = ['url'];


    public function menuable()
    {
        return $this->morphTo();
    }
}
