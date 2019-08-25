@extends('adminlte::page')
@extends('layouts.style')
@section('mystyle')
@stop

@section('content_header')
    <h1 class="text-center">{{$book->name}}</h1>
@stop

@section('content')
    <embed src="/{{$book->pdf? $book->pdf->file: 'No Book Available Right Now'}}" width="1100px" height="1000px" />
@stop