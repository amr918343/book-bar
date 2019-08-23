@extends('adminlte::page')
@extends('layouts.style')
@section('mystyle')
@stop
@section('content_header')
    <h1 class="text-center text-primary"> <i class="fa fa-book"></i> Add New book</h1>
@stop

@section('content')
    <div class="container bg-white">
        <div class="col-sm-offset-4 col-sm-4">
            @include('includes.errors')
        </div>

        <form method="POST" action="{{action('AdminBooksController@store')}}" class="col-sm-offset-4 col-sm-4" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <div class="form-group ">
                <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter name">
            </div>

            <div class="form-group mb-5">

                <select name="category_id" class="form-control" id="category">
                    <option class="text-center" value="0">------------------------ Choose Category ------------------------</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group">
                <label for="photo">Select a Photo</label>
                <input type="file" name="photo_id" class="form-control" id="photo">
            </div>

            <div class="form-group">
                <label for="pdf">Select a PDF</label>
                <input type="file" name="pdf_id" class="form-control" id="pdf">
            </div>

            <div class="form-group">
                <button style="width:100%" type="submit" class="btn btn-sm btn-primary"> <i class="fa fa-plus-square"></i> Add New Book</button>
            </div>
        </form>
    </div>
@stop