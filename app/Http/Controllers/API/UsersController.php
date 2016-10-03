<?php

namespace Copya\Http\Controllers\API;

use Copya\Http\Controllers\API\ApiBaseController;
use Illuminate\Http\Request;
use App\User;
use Copya\Transformers\UserTransformer;

class UsersController extends ApiBaseController
{
	public function index()
	{
		$users = User::all();
		return $this->collection($users, new UserTransformer);
	}
}
