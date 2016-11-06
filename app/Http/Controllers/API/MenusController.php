<?php

namespace Copya\Http\Controllers\API;

use Copya\Transformers\MenuTransformer;
use Exception;
use Auth;
use Copya\Eloquent\Menu;
use Illuminate\Http\Request;
use Copya\Eloquent\Navigation;

class MenusController extends ApiBaseController
{
    public function index(Request $request)
    {
        $navigation = Navigation::find($request->get('nav_id'));

        $ids = array();

        foreach($navigation->menus as $menu){
            $ids[] = $menu->id;
        }

        $menus = Menu::whereNotIn('id', $ids)->get();

        return $this->collection($menus, new MenuTransformer);
    }

}
