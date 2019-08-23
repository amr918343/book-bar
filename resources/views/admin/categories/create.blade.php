@extends('adminlte::page')
@extends('layouts.style')
@section('mystyle')
@stop
@section('content_header')
    <h1 class="text-center text-primary"> <i class="fa fa-list-alt"></i>  Add New Category</h1>
@stop

@section('content')
    <div class="container bg-white">
        <form class="col-lg-offset-4 col-sm-4" autocomplete="off" enctype="multipart/form-data">
            <div class="form-group ">

                <input type="name" name="name" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter name">
            </div>
            <div class="form-group">

                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group mb-5">

                <select name="role_id" class="form-control" id="role">
                    <option class="text-center" value="0">---------------------------- Choose Role ----------------------------</option>
                    @foreach($categories as $category)
                        <option value=""></option>
                    @endforeach
                </select>

                <div class="form-group">
                    <label for=""></label>
                    <input type="file" name="photo_id" class="form-control" id="photo">
                </div>

                <button style="width:100%" type="submit" class="btn btn-sm btn-primary"> <i class="fa fa-user-plus"></i> Create user</button>
        </form>
    </div>
@stop