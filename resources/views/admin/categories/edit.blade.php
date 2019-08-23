@extends('adminlte::page')
@extends('layouts.style')
@section('mystyle')
@stop
@section('content')
    <div class="col-xs-offset-2 col-sm-8">

    @include('includes.errors')

    <form method="POST" action="{{action('AdminCategoriesController@update', $category->id)}}" id="form-category" autocomplete="off" enctype="multipart/form-data">
        @csrf
        <div id="form-category-name" class="form-group ">
            <label id="label-category-name" class="text-primary" for="name"> <i class="fa fa-th-list"></i> Edit Category</label>
            <input type="text" name="name" class="form-control" id="name" value="{{$category->name}}">
        </div>

        <div id="form-category-description" class="form-group ">

            <textarea class="form-control" name="description">{{$category->description}}</textarea>
        </div>

        <div class="form-group">
            <button type="submit" id="btn-category" class="btn btn-sm btn-primary"> <i class="fa fa-pencil-square-o"></i> Edit Category</button>
        </div>
        {{method_field('PATCH')}}
    </form>
</div>
@stop