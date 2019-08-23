@extends('adminlte::page')
@extends('layouts.style')
@section('mystyle')
@stop
@section('content')
    @if($users)
        {{$users->render()}}
        <table class="table table-bordered text-center">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Gender</th>
            <th scope="col">Photo</th>
            <th scope="col">Created at</th>
            <th scope="col">Updated at</th>
            <th scope="col">Control</th>
        </tr>
        </thead>
        <tbody>
        @if($users)
            @foreach($users as $user)
                <tr>

                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->name}}</td>
                    <td>
                        @if($user->gender)
                            @if($user->gender->gender == 'male')
                                <i class="fa fa-mars-stroke"></i>
                            @else
                                <i class="fa fa-venus"></i>
                            @endif
                        @else
                            Null
                        @endif
                    </td>
                    <td>
                        @if($user->gender)
                            @if($user->gender->gender == 'male')
                                <img height="35px" width="35px" src="{{$user->photo ? str_replace('images/users\\', '', str_replace('C:\xampp\htdocs\I Love Reading\public\\', '', asset($user->photo->file))) : '/images/users/user_male.gif'}}" alt="{{$user->name}}">
                                @else
                                <img height="35px" width="35px" src="{{$user->photo ? str_replace('images/users\\', '', str_replace('C:\xampp\htdocs\I Love Reading\public\\', '', asset($user->photo->file))) : 'images/users/user_female.png'}}" alt="{{$user->name}}">
                                @endif
                                @else
                            <img src="http://placehold.it/50x50" alt="">
                            @endif
                    </td>
                    <td>{{$user->created_at ? $user->created_at->diffForHumans() : 'Null'}}</td>
                    <td>{{$user->updated_at ? $user->updated_at->diffForHumans() : 'Null'}}</td>
                @if(auth::user()->id != $user->id)
                    <td>
                        <a class="btn btn-sm btn-vk" href="users/{{$user->id}}/edit"><i class="fa fa-edit"></i></a>
                        <form method="POST" action="{{action('AdminUsersController@destroy', $user->id)}}" class="form_del">
                            @csrf
                            {{@method_field('DELETE')}}
                            <button type="submit" class="btn btn-sm btn-pinterest btn-outline-danger"><i class="fa fa-times text-light line"></i></button>
                        </form>
                    </td>
                @else
                        <td>
                            <button class="btn btn-sm btn-vk" disabled><i class="fa fa-edit"></i></button>
                            <button class="btn btn-sm btn-pinterest btn-outline-danger" disabled><i class="fa fa-times text-light line"></i></button>
                        </td>
                @endif
                </tr>
            @endforeach
        @endif

        </tbody>
    </table>
    @else
        <img class="col-lg-offset-4" src="/images/icons/NoDataFound.png" alt="s">
    @endif
@stop