<?php

namespace Copya\Transformers;

use League\Fractal\TransformerAbstract;

class PageTransformer extends TransformerAbstract
{
    public function transform($page)
    {
        if (is_null($model = config('copya.models.page'))) {
            throw new RuntimeException('Unable to determine user model from configuration.');
        }

        if (!is_a($page, $model)) {
            throw new RuntimeException('Unable to determine user model from configuration.');
        }

        if($page->deleted_at){
            $status = 'trashed';
        } elseif($page->published_at) {
            $status = 'published';
        } else {
            $status = 'trashed';
        }

        return [
            'id' => (int)$page->id,
            'title' => $page->title,
            'slug' => $page->slug,
            'content' => $page->content,
            'status' => $status,
            'excerpt' => strip_tags($page->content),
            'layout' => $page->layout,
            'created_at' => date("M-d-Y", strtotime($page->created_at)),
            'updated_at' => date("M-d-Y", strtotime($page->updated_at)),
        ];
    }
}