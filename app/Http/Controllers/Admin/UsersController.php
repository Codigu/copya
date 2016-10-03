<?php

namespace Copya\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;
use App\User;

class UsersController extends BaseController
{
    public function index()
    {
        $users = User::all();

        return response()->json($users);

    }
}
