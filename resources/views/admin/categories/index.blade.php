@extends('adminlte::page')
@extends('layouts.style')
@section('mystyle')
@stop
@section('content')



        <div class="container bg-white">
            <div class="col-sm-6">

                @include('includes.errors')

                <form method="POST" action="{{action('AdminCategoriesController@store')}}" id="form-category" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div id="form-category-name" class="form-group ">
                        <label id="label-category-name" class="text-primary" for="name"> <i class="fa fa-th-list"></i> Add Category</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Category Name">
                    </div>

                    <div id="form-category-description" class="form-group ">

                        <textarea class="form-control" name="description" placeholder="Write Category Description"></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" id="btn-category" class="btn btn-sm btn-primary"> <i class="fa fa-plus-square"></i> Add New Category</button>
                    </div>

                </form>
            </div>

            <div class="col-sm-6 category-table">
                @if(count($categories) > 0)
                    <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Updated at</th>
                    <th scope="col">Control</th>
                </tr>
                </thead>
                <tbody>
                @if($categories)
                    @foreach($categories as $category)
                        <tr>

                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td id="category_description"><p>{{$category->description}}</p></td>
                            <td>{{$category->created_at? $category->created_at->diffForHumans() : "Null"}}</td>
                            <td>{{$category->created_at? $category->created_at->diffForHumans() : "Null"}}</td>
                            <td>

                                <a class="btn btn-sm btn-vk" href="categories/{{$category->id}}/edit"><i class="fa fa-edit"></i></a>
                                <form method="POST" action="{{action('AdminCategoriesController@destroy', $category->id)}}" class="form_del">
                                    @csrf
                                    {{@method_field('DELETE')}}
                                    <button type="submit" class="btn btn-sm btn-pinterest btn-outline-danger"><i class="fa fa-times text-light line"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif

                </tbody>
            </table>
                @else
                    <img class="col-lg-offset-4" src="/images/icons/NoDataFound.png" alt="No Data Found">
                @endif
            </div>
        </div>
@stop