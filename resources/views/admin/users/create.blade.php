@extends('adminlte::page')
@extends('layouts.style')
@section('mystyle')
@stop
@section('content_header')
    <h1 class="text-center text-primary"> <i class="fa fa-user-plus"></i> Add New User</h1>
@stop

@section('content')
    <div class="container bg-white">

        <div class="col-sm-offset-4 col-sm-4">
            @include('includes.errors')
        </div>

         <form method="POST" action="{{action('AdminUsersController@store')}}" class="col-lg-offset-4 col-sm-4" autocomplete="off" enctype="multipart/form-data">
             @csrf

             <div class="form-group ">
                <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter name">
            </div>


             <div class="form-group">

                 <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                 <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
             </div>

             <div class="form-group ">
                 <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
             </div>

             <div class="form-group ">
                 <input type="password" name="password_confirmation" class="form-control" id="confirm-password" placeholder="Confirm password">
             </div>

             <div class="form-group mb-5">

                 <select name="gender_id" class="form-control" id="gender">
                     <option class="text-center" value="0">--------------------------- Choose Gender ---------------------------</option>
                     @foreach($genders as $gender)
                         <option value="{{$gender->id}}">{{$gender->gender}}</option>
                     @endforeach
                 </select>
             </div>

             <div class="form-group mb-5">

                <select name="role_id" class="form-control" id="role">
                    <option class="text-center" value="0">---------------------------- Choose Role ----------------------------</option>
                    @foreach($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                </select>
             </div>


            <div class="form-group">
                <label for="photo_id">Select a photo</label>
                <input type="file" name="photo_id" class="form-control" id="photo">
            </div>

             <div class="form-group">
                <button style="width:100%" type="submit" class="btn btn-sm btn-primary"> <i class="fa fa-user-plus"></i> Create user</button>
            </div>

        </form>
    </div>
@stop