
@extends('vendor.copya.layouts.app')

@section('layout')
    <header class="navbar navbar-absolute-top" id="top">
        <nav class="navbar navbar-inverse" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a href="#" class="navbar-brand">Caffeinated Menu</a>
                </div>

                <div class="collapse navbar-collapse" id="menu-collapse">
                    <ul class="nav navbar-nav">
                        @include('vendor.copya.partials.menu.items', ['items'=> $menu_header_menu->roots()])
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="row">
        <div class="col-md-3 sidebar"></div>
        <div class="col-md-6 main">
            <h3>Default Column</h3>
            @yield('content')
        </div>
    </div>
@endsection
