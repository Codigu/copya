<?php

namespace Copya\Http\Controllers\Admin;

class PagesController extends BaseController
{
    public function index()
    {
        return view('copya.admin.pages.index', array('sidenav' => $this->getSideNav()));
    }
}
