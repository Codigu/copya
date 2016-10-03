<?php

namespace Copya\Http\Controllers\API;

use Copya\Http\Controllers\API\ApiBaseController;
use Illuminate\Http\Request;
use App\User;

class UsersController extends ApiBaseController
{
	public function index()
	{
		$users = User::all();
		return response()->json($users);
	}
}
