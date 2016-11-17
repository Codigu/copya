@extends('vendor.copya.layouts.frontend.'.$page->layout, ['title' => $page->title])

@section('content')
    <h1>{{ $page->title }}</h1>
    <div class="row">
        <div class="col-md-12">
            {!!  $page->content  !!}
        </div>
    </div>
@endsection