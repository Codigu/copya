<?php

namespace Copya\Transformers;

use League\Fractal\TransformerAbstract;

class PageTransformer extends TransformerAbstract
{
    public function transform()
    {
        if (is_null($model = config('copya.models.page'))) {
            throw new RuntimeException('Unable to determine user model from configuration.');
        }

        $page = new $model;


        return [
            'id'            => (int) $page->id,
            'title'         => $page->title,
            'slug'          => $page->slug,
            'content'       => $page->content,
            'published'     => ($page->published_at) ? true : false,
            'trashed'       => ($page->deleted_at) ? true : false,
        ];
    }
}