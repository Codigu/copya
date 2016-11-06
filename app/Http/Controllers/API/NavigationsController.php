<?php

namespace Copya\Http\Controllers\API;

use Carbon\Carbon;
use Copya\Eloquent\Menu;
use Exception;
use Copya\Transformers\PageTransformer;
use Copya\Http\Requests\NavigationRequest;
use Auth;
use Copya\Eloquent\Navigation;
use Copya\Transformers\NavigationTransformer;

class NavigationsController extends ApiBaseController
{


    public function index()
    {
        //return $this->collection($this->model->all(), new PageTransformer);
        return response()->json(['data' => Navigation::all()]);
    }

    public function show($id)
    {
        $navigation = Navigation::find($id);

        return $this->item($navigation, new NavigationTransformer);
    }

    public function store(NavigationRequest $request)
    {
        try {
            $navigation = new Navigation;

            $navigation['display_name'] = $request->name;

            $navigation->save();

        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

        return response()->json(['data' => $navigation]);
    }

    public function update(NavigationRequest $request, $id)
    {
        //$items = $request->get('items');
        if($request->has('items')){
            return $this->saveNavigationItems($request->get('id'), $request->get('items'));
        }

        try {

        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

        return $this->item($page, new PageTransformer());
    }

    private function saveNavigationItems($id, $items)
    {
        try{
            $navigation = Navigation::find($id);

            //build data
            $data = array();


           /* $ids = array();
            array_walk_recursive($items, function($value, $key) use (&$ids) {
                if($key == 'id'){
                    $ids[] = $value;
                }
            });*/


            foreach($items as $key => $menu){
                $data[$menu['id']] = array(
                    'parent_id' => null,
                    'name' => 'to be updated',
                    'url' => $menu['url'],
                );

                if(count($menu['items']) > 0){
                    foreach($menu['items'] as $key => $submenu){
                        $data[$submenu['id']] = array(
                            'parent_id' => $menu['id'],
                            'name' => 'to be updated',
                            'url' => $submenu['url'],
                        );
                    }
                }
            }

            $navigation->menus()->sync($data);

        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

        return response()->json(['data' => $navigation]);
    }
}
