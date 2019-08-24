@extends('adminlte::page')
@extends('layouts.style')
@section('mystyle')
@stop
@section('content_header')
    <h1 class="text-center text-primary"> <i class="fa fa-book"></i> Edit Book</h1>
@stop

@section('content')
    <div class="container bg-white">
        <div class="content-error col-lg-offset-3 col-sm-4">
            @include('includes.errors')
        </div>
        <form method="POST" action="{{action('AdminBooksController@update', $book->id)}}" class="col-lg-offset-4 col-sm-4" autocomplete="off" enctype="multipart/form-data">


                <img class="col-sm-offset-2 user-img img-responsive img-thumbnail" src="/{{$book->photo ? $book->photo->file : 'images/book/unknown.png'}}" alt="Book photo">



            @csrf

            <div class="form-group ">
                <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp" value="{{$book->name}}">
            </div>

            <div class="form-group ">
                <textarea class="form-control" name="description" id="book-description" cols="30" rows="10">{{$book->description}}</textarea>
            </div>

            <div class="form-group ">
                <input type="text" name="author_id" class="form-control" id="book-author" aria-describedby="nameHelp" value="{{($book->author) ? $book->author->name : ''}}" placeholder="Eneter Author Name">
            </div>


            <div class="form-group mb-5">

                <select name="category_id" class="form-control" id="category">
                    @foreach($categories as $category)
                        @if($book->category)
                            @if($book->category->name == $category->name)
                                <option value="{{$category->id}}" selectec="selected">{{$category->name}}</option>
                            @else
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endif
                        @else
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>


            <div class="form-group">
                <label for="photo_id">Select a photo</label>
                <input type="file" name="photo_id" class="form-control" id="photo" >
            </div>

            <div class="form-group">
                <label for="photo_id">Select a pdf</label>
                <input type="file" name="pdf_id" class="form-control" id="photo" >
            </div>

            <div class="form-group">
                <button style="width:100%" type="submit" class="btn btn-sm btn-primary"> <i class="fa fa-pencil-square-o"></i> Edit Book</button>
            </div>
            {{method_field('PUT')}}
        </form>
    </div>
@stop