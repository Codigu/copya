<?php

namespace Copya\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    protected $table = 'navigations ';
    protected $fillable = ['name', 'display_name'];


    public function items()
    {
        //return $this->hasMany()
    }
}
