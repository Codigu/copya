<?php

namespace Copya\Http\Controllers\API;

use Carbon\Carbon;
use Copya\Http\Controllers\API\ApiBaseController;
use Exception;
use Illuminate\Http\Request;
use Copya\Transformers\PageTransformer;
use Copya\Http\Requests\PageRequest;
use Auth;
use Copya\Eloquent\Menu;

class PagesController extends ApiBaseController
{
    protected $model;

    public function __construct()
    {
        parent::__construct();
        if (is_null($model = config('copya.models.page'))) {
            throw new RuntimeException('Unable to determine user model from configuration.');
        }

        $this->model = new $model;
    }


    public function index()
    {
        return $this->collection($this->model->withTrashed()->get(), new PageTransformer);
    }

    public function show($id)
    {
        try {
            $page = $this->model->withTrashed()->find($id);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

        return $this->item($page, new PageTransformer);
    }

    public function store(PageRequest $request)
    {
        $data = $request->except(['errors', 'id', 'trashed']);

        try {
            $page = $this->model;

            $page->title = $data['title'];
            $page->content = $data['content'];
            //$page->layout = $data['layout'];
            //$page->published_at = ($data['status'] == 'published') ? Carbon::now() : null;
            $page->user_id = Auth::user()->id;

            $page->save();

            /*
             * save the slug to menuable
             */

            $menu = new Menu(['url' => $page->slug, 'name' => $page->title]);
            $page->menus()->save($menu);


        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

        return $this->item($page, new PageTransformer());
    }

    public function update(PageRequest $request, $id)
    {
        $data = $request->except(['errors', 'id', 'trashed', 'slug']);

        try {
            if($data['action'] == 'restore'){
                $page = $this->model->withTrashed()->find($id);
                $page->restore();
            } else {
                $page = $this->model->find($id);

                $published_at = null;
                if ($page->published_at) {
                    $published_at = ($data['status'] == 'published') ? $page->published_at : null;
                } else {
                    $published_at = ($data['status'] == 'published') ? Carbon::now() : null;
                }

                $page->title = $data['title'];
                $page->content = $data['content'];
                $page->layout = $data['layout'];
                $page->published_at = $published_at;
                $page->user_id = Auth::user()->id;

                $menu = $page->menus()->first();

                $menu->url = $page->slug;
                $menu->name = $page->title;

                $page->save();
                $menu->save();
            }

        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

        return $this->item($page, new PageTransformer());
    }


    public function destroy($id)
    {
        $page = $this->model->find($id);
        if (!$page) {
            return response()->json(['error' => 'Entity not processable'], 402);
        }
        try {
            $page->destroy($id);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }


        return response()->json(['deleted' => true, 'message' => 'Page Deleted Successfully.']);
    }

    public function getTemplates()
    {
        $path = config('copya.layouts');
        $layouts = [];
        try {
            $files = array_diff(scandir(base_path($path)), ['..', '.']);

            foreach($files as $file){
                $layouts[] = str_replace(".blade.php", "", $file);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }

        return response()->json(['data' =>$layouts]);
    }
}
