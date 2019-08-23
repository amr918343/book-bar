@extends('adminlte::page')
@extends('layouts.style')
@section('mystyle')
@stop
@section('content_header')
    <h1 class="text-center text-primary"> <i class="fa fa-user-plus"></i> Edit User</h1>
@stop

@section('content')
    <div class="container bg-white">
        <div class="row">
            <div class="col-sm-offset-4 col-sm-4">
                @include('includes.errors')
            </div>
        </div>
        <form method="POST" action="{{action('AdminUsersController@update', $user->id)}}" class="col-lg-offset-4 col-sm-4" autocomplete="off" enctype="multipart/form-data">
            @csrf
    @if($user->gender)
        @if($user->gender->gender == 'male')
            <img class="col-sm-offset-2 user-img img-responsive img-circle img-thumbnail" src="/{{$user->photo ? $user->photo->file : 'images/users/user_male.gif'}}" alt="User photo">
        @else
            <img class="col-sm-offset-2 user-img img-responsive img-circle img-thumbnail" src="/{{$user->photo ? $user->photo->file : 'images/users/user_female.png'}}" alt="User photo">
        @endif
    @else
                <img class="col-sm-offset-2 user-img img-responsive img-circle img-thumbnail" src="http://placehold.it/200x200" alt="">
    @endif

    <div class="form-group ">
        <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp" value="{{$user->name}}">
    </div>


    <div class="form-group">

        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" value="{{$user->email}}">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="form-group ">
        <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
    </div>

    <div class="form-group ">
        <input type=    "password" name="password_confirmation" class="form-control" id="confirm-password" placeholder="Confirm password">
    </div>

    <div class="form-group mb-5">
        <label for="gender">Gender</label>
        <select name="gender_id" class="form-control" id="gender">

            @foreach($genders as $gender)
                @if($user->gender)
                    @if($user->gender->gender == $gender->gender)
                        <option value="{{$gender->id}}" selected="selected">{{$gender->gender}}</option>
                        @else
                        <option value="{{$gender->id}}">{{$gender->gender}}</option>
                    @endif
                @else
                    <option value="{{$gender->id}}">{{$gender->gender}}</option>
                @endif
            @endforeach
        </select>
    </div>

    <div class="form-group mb-5">
        <label for="role">Role</label>
        <select name="role_id" class="form-control" id="role">

            @foreach($roles as $role)
                @if($user->role->name == $role->name)
                    <option value="{{$role->id}}" selected="selected">{{$role->name}}</option>
                @else
                    <option value="{{$role->id}}">{{$role->name}}</option>
                @endif
            @endforeach
        </select>
    </div>


    <div class="form-group">
        <input type="file" name="photo_id" class="form-control" id="photo">
    </div>

    <div class="form-group">
        <button style="width:100%" type="submit" class="btn btn-sm btn-primary"> <i class="fa fa-user-plus"></i> Edit user</button>
    </div>

    {{method_field('PUT')}}
</form>
</div>
@stop