<?php

namespace Copya\Lib;

use Illuminate\Routing\Router;
use Illuminate\Routing\Route;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Config;

class RouteGenerator
{
    protected $router;
    protected $routes;

    public function __construct(Router $router)
    {
        $this->router = $router;
        $this->routes = $router->getRoutes();

    }


    /**
     * Compile the routes into a displayable format.
     *
     * @return array
     */
    public function getRoutes()
    {
        $results = [];

        foreach ($this->routes as $route) {
            $results[] = $this->getRouteInformation($route);
        }


        return array_filter($results);
    }

    /**
     * Get the route information for a given route.
     *
     * @param  \Illuminate\Routing\Route  $route
     * @return array
     */
    protected function getRouteInformation(Route $route)
    {
        return $this->filterRoute([
            'name'   => $route->getName(),
            'uri'    => $route->uri(),
        ]);
    }



    /**
     * Filter the route by URI and / or name.
     *
     * @param  array  $route
     * @return array|null
     */
    protected function filterRoute(array $route)
    {
        if ( ! Str::contains($route['uri'], Config::get('copya.admin_path'))
            || $route['uri'] == Config::get('copya.admin_path')
            || preg_match('/^.*[{}].*$/', $route['uri'])) {
            return;
        }

        return $route;
    }

}
