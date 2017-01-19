<?php

namespace Copya\Middlewares;

use Closure;
use Copya\Eloquent\Navigation;
use Caffeinated\Menus\Facades\Menu;

class CopyaMenu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $navigations = Navigation::all();

        foreach($navigations as $navigation){

            $items = $this->buildMenu($navigation);

            $nav_name = str_replace('-', '_', $navigation->name);

            Menu::make($nav_name, function($menu) use ($items) {

                foreach($items as $item){
                    //dd($item);
                    $menu_item = $menu->add($item['name'], $item['url']);

                    if(count($item['items']) > 0){
                        foreach($item['items'] as $subItem){
                            $menu_item->add($subItem['name'], $subItem['url']);
                        }
                    }
                }
            });
        }

        return $next($request);
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
