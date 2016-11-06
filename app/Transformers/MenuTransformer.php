<?php

namespace Copya\Transformers;

use League\Fractal\TransformerAbstract;
use Copya\Eloquent\Menu;

class MenuTransformer extends TransformerAbstract
{
    public function transform(Menu $menu)
    {

        return [
            'id' => (int) $menu->id,
            'url' => $menu->url,
            'items' => []
        ];
    }
}