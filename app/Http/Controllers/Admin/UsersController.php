<?php

namespace Copya\Http\Controllers\Admin;

use Illuminate\Routing\Controller as BaseController;
use App\User;

class UsersController extends BaseController
{
    public function index()
    {
        return view('copya.admin.users.index');
    }
}
