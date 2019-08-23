@extends('adminlte::page')
@extends('layouts.style')
@section('mystyle')
@stop

@section('title', 'Dashboard')
@section('content_header')
    <h1 class="dashboard-header">Dashboard</h1>
@stop

@section('content')



    <div class="dashboard-wrapper">
        <div class="container">
            <div class="row">
                <a class="dashboard-count col-md-4" href="{{route('users.index')}}">

                        <div class="panel panel-danger">
                            <div class="panel-body">
                                <span class="bg-white white-circle1"></span>
                                <span class="bg-white white-circle2"></span>
                                <i class="fa fa-users"></i>
                                <span class="name-span">Users</span>
                                <span class="count-span">{{count($users) ? count($users) : '0'}}</span>
                            </div>
                        </div>

                </a>

                <a class="dashboard-count col-md-4" href="{{route('books.index')}}">

                        <div class="panel panel-danger">
                            <div class="panel-body">
                                <span class="bg-white white-circle1"></span>
                                <span class="bg-white white-circle2"></span>
                                <i class="fa fa-book"></i>
                                <span class="name-span">Books</span>
                                <span class="count-span">{{count($books) ? count($books) : '0'}}</span>

                            </div>
                        </div>

                </a>

                <a class="dashboard-count col-md-4" href="{{route('categories.index')}}">

                        <div class="panel panel-danger">
                            <div class="panel-body">
                                <span class="bg-white white-circle1"></span>
                                <span class="bg-white white-circle2"></span>
                                <i class="fa fa-clipboard-list"></i>
                                <span class="name-span">Categories</span>
                                <span class="count-span">{{ $categories ? count($categories) : '0'}}</span>
                            </div>
                        </div>

                </a>

            </div>
            <div class="row dashboard-last">
                <div class="col-sm-6">

                </div>

                <div class="col-sm-6">
                    b
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop