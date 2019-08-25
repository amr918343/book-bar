@extends('adminlte::page')
@extends('layouts.style')
@section('mystyle')
@stop
@section('content')
    @if($users)
        {{$users->render()}}

        <form action="{{route('deleteSelected-user')}}" method="POST" class="form-inline">
            @csrf
            {{method_field('DELETE')}}
            <select name="checkBoxArray" id="" class="form-control">
                <option value="delete">Delete All Data in This Page</option>
            </select>
            <input type="submit" id="submitBtn" class="btn btn-danger" value="Delete" disabled="disabled">

            <table class="table table-bordered text-center">
                <thead>
                <tr>
                    <th scope="col">
                        <input type="checkbox" id="option" class="custom-checkbox">
                    </th>
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
                            <td>
                                <input type="checkbox" name="checkBoxArray[]" class="checkboxes" value="{{$user->id}}">
                            </td>
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
                                        <img height="35px" width="35px"
                                             src="{{$user->photo ? $user->photo->file : '/images/users/user_male.gif'}}"
                                             alt="{{$user->name}}">
                                    @else
                                        <img height="35px" width="35px"
                                             src="{{$user->photo ? $user->photo->file : '/images/users/user_female.png'}}"
                                             alt="{{$user->name}}">
                                    @endif
                                @else
                                    <img src="http://placehold.it/50x50" alt="">
                                @endif
                            </td>
                            <td>{{$user->created_at ? $user->created_at->diffForHumans() : 'Null'}}</td>
                            <td>{{$user->updated_at ? $user->updated_at->diffForHumans() : 'Null'}}</td>
                            @if(auth::user()->id != $user->id)
                                <td>
                                    <a class="btn btn-sm btn-vk" href="users/{{$user->id}}/edit"><i
                                                class="fa fa-edit"></i></a>
                                    <form method="POST" action="{{action('AdminUsersController@destroy', $user->id)}}"
                                          class="form_del">
                                        @csrf
                                        {{@method_field('DELETE')}}
                                        <button type="submit" class="btn btn-sm btn-pinterest btn-outline-danger"><i
                                                    class="fa fa-times text-light line"></i></button>
                                    </form>
                                </td>
                            @else
                                <td>
                                    <button class="btn btn-sm btn-vk" disabled><i class="fa fa-edit"></i></button>
                                    <button class="btn btn-sm btn-pinterest btn-outline-danger" disabled><i
                                                class="fa fa-times text-light line"></i></button>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                @endif

                </tbody>

                <a href="{{route('users.create')}}" class="btn btn-primary">+</a>

            </table>
        </form>
    @else
        <div class="row no-data">
            <img class="col-xs-offset-5" width="200px" src="/images/icons/NoDataFound.png" alt="">
            <a href="{{route('users.create')}}">
                <img class="col-xs-offset-5" width="200px" src="/images/icons/add.jpg" alt="">
            </a>
        </div>
    @endif
@stop

@section('js')
    @include('includes.checkbox')
@stop