
@extends('vendor.copya.layouts.app')

@section('layout')
    <header class="navbar navbar-absolute-top" id="top">
        <div class="navbar-top">
            <div class="container">
                <ul class="nav navbar-nav navbar-right">
                    <li> <a href="">Student</a> </li>
                    <li> <a href="">Alumni</a> </li>
                    <li> <a href=""><i class="fa fa-search"></i></a> </li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle" data-toggle="fullscreen" data-target="#wd-navbar" type="button">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="../" class="navbar-brand"><img src="/images/uv_seal.png" width="90" alt=""></a>
            </div>
            <nav class="navbar-fullscreen" id="wd-navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li> <a href="">Admissions</a> </li>
                    <li> <a href="">Academics</a> </li>
                    <li> <a href="">Research</a> </li>
                    <li> <a href="">Services</a> </li>
                    <li> <a href="">About Us</a> </li>
                    <li> <a href="">News &amp; Events</a> </li>
                    <li> <a href="" class="btn">Get Started</a> </li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="row">
        <div class="col-md-3 sidebar"></div>
        <div class="col-md-6 main">
            <h3>Default Column</h3>
            @yield('content')
        </div>
    </div>
@endsection
