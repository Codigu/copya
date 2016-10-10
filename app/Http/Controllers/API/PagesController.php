<?php

namespace Copya\Http\Controllers\API;

use Copya\Http\Controllers\API\ApiBaseController;
use Illuminate\Http\Request;
use Copya\Transformers\PageTransformer;
use Log;
use Copya\Http\Requests\PageRequest;
use Carbon;
use Auth;

class PagesController extends ApiBaseController
{
	protected $model;

	public function __construct()
	{
		if (is_null($model = config('copya.models.page'))) {
			throw new RuntimeException('Unable to determine user model from configuration.');
		}

		$this->model = new $model;
	}


	public function index()
	{
		return $this->collection($this->page->all(), new PageTransformer);
	}

	public function store(PageRequest $request)
	{
		$data = $request->except(['errors']);
		$page = $this->model;

		$page->title = $data['title'];
		$page->content = $data['content'];
		$page->published_at = ($data['status'] == 'published') ? Carbon::now() : null;
		$page->user_id = Auth::user()->id;

		$page->save();

		return $this->item($page, new PageTransformer());
	}
}
