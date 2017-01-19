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

        $treeMenu = count($flatMenu) > 1 ? $this->createTree($flatMenu, 'parent_id', 'menu_id') : $flatMenu;
        return $treeMenu;
    }




    protected function createTree($menu, $parent_key, $item_id){
        $tree = [];
        $children = [];

        foreach ($menu as $k => $item){
            if($item[$parent_key]){
                $children[$item[$parent_key]] = $item;
            } else {
                $tree[$item[$item_id]] = $item;
            }
        }

        foreach($children as $child){
            $tree[$child[$parent_key]]['items'][] = $child;
        }

        return array_values($tree);
    }

}