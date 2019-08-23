@extends('adminlte::page')
@extends('layouts.style')
@section('mystyle')
@stop
@section('content_header')
    <h1 class="text-center text-success"> <i class="fa fa-book"></i> Books</h1>
@stop

@section('content')
    @if(count($books) > 0)
    <table class="table table-bordered table-hover text-center">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Category</th>
            <th scope="col">Photo</th>
            <th scope="col">Created at</th>
            <th scope="col">Updated at</th>
            <th scope="col">Control</th>
        </tr>
        </thead>
        <tbody>
        @if($books)
            @foreach($books as $book)
                <tr>

                    <td>{{$book->id}}</td>
                    <td>{{$book->name}}</td>
                    <td>{{$book->category ? $book->category->name : 'Not Categorized yet'}}</td>
                    <td><a href="books/{{$book->id}}"><img height="35px" width="50" src="/{{$book->photo ? $book->photo->file : 'images/book/unknown.png'}}" alt="{{$book->name}}"></a></td>
                    <td>{{$book->created_at->diffForHumans()}}</td>
                    <td>{{$book->updated_at->diffForHumans()}}</td>
                    <td>
                        <a class="btn btn-sm btn-vk" href="books/{{$book->id}}/edit"><i class="fa fa-edit"></i></a>
                        <form method="POST" action="{{action('AdminBooksController@destroy', $book->id)}}" class="form_del">
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
        <img class="" src="/images/icons/NoDataFound.png" alt="s">
    @endif
@stop