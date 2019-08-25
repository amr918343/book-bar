@extends('layouts.blog-home')
@section('content')
    <div class="col-12">
        <h1 class="text-muted mb-5">Categories</h1>
    </div>
    @foreach($categories as $category)
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
            <a href="{{route('categorybooks', $category->id)}}">
                <div class="book-restult">
                    <h3 style="height: 47px;">{{$category->name}}</h3>
                    <p style="height: 21px;">
                        <i class="fa fa-book-open"></i> {{{count($category->books)}}}
                    </p>
                </div>
            </a>
        </div>
    @endforeach
@stop