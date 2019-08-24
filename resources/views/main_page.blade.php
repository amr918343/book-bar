@extends('layouts.blog-home')
@section('content')




    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Categories</li>
            @foreach($categories as $category)
                <li class="breadcrumb-item">
                    <a href="#">{{$category->name}}</a>
                </li>
            @endforeach

        </ol>
    </nav>


    <div class="row col-12">{{$books->render()}}</div>
    @foreach($books as $book)
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-6">
            <div class="book-restult">
                <div class="book_rating_avg">
                    <i class="fa fa-star"></i><i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o fa-flip-horizontal"></i>
                    <i class="fa fa-star-o"></i>
                    <span class="book_rating_count">(39)</span>
                </div>
                <a class="img-a" href="">
                    <div class="book_photo_container_results" style="background: rgba(189, 195, 199,0.4)">
                        <img src="{{$book->photo->file}}">
                    </div>
                </a>
                <a  href="">
                    <h3>{{$book->name}}</h3>
                </a>
                <a  href="#">
                    <p>{{$book->author ? $book->author->name : 'No Author'}}</p>
                </a>
            </div>
        </div>
    @endforeach
@stop