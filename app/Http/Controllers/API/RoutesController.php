<?php

namespace Copya\Http\Controllers\API;

use Copya\Lib\RouteGenerator;

class RoutesController extends ApiBaseController
{
    public function index(RouteGenerator $routeGenerator)
    {
        $routes = $routeGenerator->getRoutes();
        $navigation = [];

        foreach($routes as $route){
            $uri = explode('/', $route['uri']);
            $navigation[$uri[1]][] = array(
                'nav_name' => $route['name'],
                'nav_item' => $route['uri'],
            );
        }

        return response()->json(['data' => $navigation]);
    }
}
