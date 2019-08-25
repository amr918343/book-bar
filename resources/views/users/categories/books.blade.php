@extends('layouts.blog-home')
@section('content')
    <div class="row col-12 mb-5"><h1>Books Related to <strong>"{{$category->name}}"</strong> Category</h1></div>
    @foreach($category->books as $book)
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
            <div class="book-restult">
                <div class="book_rating_avg">
                    <i class="fa fa-star"></i><i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o fa-flip-horizontal"></i>
                    <i class="fa fa-star-o"></i>
                    <span class="book_rating_count">(39)</span>
                </div>
                <a class="img-a" href="{{route('book', $book->id)}}">
                    <div class="book_photo_container_results" style="background: rgba(189, 195, 199,0.4)">
                        <img src="{{$book->photo->file}}">
                    </div>
                </a>
                <a  href="{{route('book', $book->id)}}">
                    <h3>{{$book->name}}</h3>
                </a>
                <a  href="{{route('authorbooks', $book->author->id)}}">
                    <p>{{$book->author ? $book->author->name : 'No Author'}}</p>
                </a>
            </div>
        </div>
    @endforeach
@stop