<?php

namespace Copya\Http\Controllers\API;

use Illuminate\Routing\Controller as BaseController;
use Closure;
use Response;
use League\Fractal\Manager;
use League\Fractal\TransformerAbstract;
use League\Fractal\Resource\Item;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\ResourceInterface;
use League\Fractal\Pagination\PaginatorInterface;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use Illuminate\Pagination\LengthAwarePaginator;

class ApiBaseController extends BaseController
{
    private $manager;
    public function __construct()
    {
        $this->manager = new Manager();
    }
    public function getManager()
    {
        return $this->manager;
    }
    public function item($item, TransformerAbstract $transformer, Closure $callback = null)
    {
        $resource = new Item($item, $transformer);

        if (! is_null($callback)) {
            call_user_func($callback, $resource);
        }
        return $this->buildResponse($resource);
    }
    public function collection($items, TransformerAbstract $transformer, Closure $callback = null, PaginatorInterface $adapter = null)
    {
        $resources = new Collection($items, $transformer);
        if (! is_null($callback)) {
            call_user_func($callback, $resources);
        }
        if ($items instanceof LengthAwarePaginator) {
            $this->paginateCollection($resources, $items, $adapter);
        }

        return $this->buildResponse($resources);
    }
    private function paginateCollection(Collection $collection, LengthAwarePaginator $paginator, PaginatorInterface $adapter = null)
    {
        if (is_null($adapter)) {
            $adapter = new IlluminatePaginatorAdapter($paginator);
        }

        $this->manager = new Manager();
        $collection->setPaginator($adapter);
    }
    private function buildResponse(ResourceInterface $resource)
    {
        //$this->manager->setSerializer(new CustomArraySerializer());
        $data = $this->manager->createData($resource);

        return Response::make($data->toArray());
    }
}