@extends('layouts.blog-home')
@section('content')
    <div class="col-12">
        {{$authors->render()}}
    </div>

    <div class="col-12">
        <h1 class="text-muted mb-5">Authors</h1>
    </div>
@foreach($authors as $author)
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
    <div class="book-restult">
        <a href="{{route('authorbooks', $author->id)}}">
            <img alt="{{$author->name}}" style="max-width: 100px;max-height: 100px;border-radius: 50%;" src="/images/users/user_male.gif">
        </a>
        <a href="{{route('authorbooks', $author->id)}}">
            <h3 style="height: 47px;">{{$author->name}}</h3>
        </a>
        <p style="height: 21px;">
            <i class="fa fa-book"></i> {{count($author->books)}} books</p>
    </div>
</div>
@endforeach
@stop