<?php

namespace Copya\Transformers;

use Copya\Eloquent\Menu;
use Copya\Eloquent\Navigation;
use League\Fractal\TransformerAbstract;
use Copya\Transformers\MenuTransformer;

class NavigationTransformer extends TransformerAbstract
{
    /*protected $defaultIncludes = [
        'menus'
    ];*/


    public function transform(Navigation $navigation)
    {
        return [
            'id' => (int) $navigation->id,
            'name' => $navigation->display_name,
            'menu' => (count($navigation->menus) > 0) ? $this->buildMenu($navigation) : [],
        ];
    }


    public function buildMenu(Navigation $navigation)
    {
        $flatMenu = [];

        foreach($navigation->menus as $menu){
            $flatMenu[] = array(
                'id' => $menu->pivot->menu_id,
                'navigation_id' => $menu->pivot->navigation_id,
                'menu_id' => $menu->pivot->menu_id,
                'parent_id' => $menu->pivot->parent_id,
                'url' => $menu->pivot->url,
                'name' => $menu->pivot->name,
                'items' => [],
            );
        }

        $treeMenu = count($flatMenu) > 1 ? $this->buildTree($flatMenu, 'parent_id', 'menu_id') : $flatMenu;
        return $treeMenu;
    }


    private function buildTree($flat, $pidKey, $idKey = null)
    {
        $grouped = array();

        foreach ($flat as $sub){
            $grouped[$sub[$pidKey]][] = $sub;
        }

        $fnBuilder = function($siblings) use (&$fnBuilder, $grouped, $idKey) {
            foreach ($siblings as $k => $sibling) {
                $id = $sibling[$idKey];
                if(isset($grouped[$id])) {
                    $sibling['items'] = $fnBuilder($grouped[$id]);
                }
                $siblings[$k] = $sibling;
            }

            return $siblings;
        };

        foreach($grouped as $group){
            $tree = $fnBuilder($group);
            break;
        }

        return $tree;
    }

}