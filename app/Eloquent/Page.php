<?php

namespace Copya\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';
    protected $date = ['published_at'];

    public function status()
    {
        return $this->hasOne(Copya\Eloquent\Status::class);
    }
}
