@extends('layouts.blog-home')
@section('content')
    <div class="col-md-9 mb-5">
        <div class="the-box desk-book-view">
            <div class="media">
                <div class="media-left">
                    <div class="book_page_img_container_parent">
                        <div class="book_page_img_container">
                            <img alt="" src="{{$book->photo->file}}" class="media-object">
                        </div>
                    </div>
                </div>
                <div class="media-body">
                    @if(session('msg-success'))<div class="alert alert-success">{{session('msg-success')}}</div>@endif
                    <h2 class="under_img_title media-heading f-s-20">{{$book->name}}</h2>

                    <div class="book_rating m-b-5 rating-top-to-img">
                        <i
                                class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o fa-flip-horizontal"></i>
                        <i class="fa fa-star-o"></i>
                        <span class="rating_num"> (38<i class="fa fa-users users_rating_ico"></i>) </span>
                    </div>

                    <div class="naskh-r f-s-20">
                        <table class="book_data_table">
                            <tbody>
                            <tr>
                                <td>
                                    <span>Book Author<span class="pull-left">:</span></span>
                                </td>
                                <td>
                                    <a href="{{route('authorbooks', $book->author->id)}}">
                                        <span id="book-writer">{{$book->author->name}}</span>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span>Book Category<span class="pull-left">:</span></span>
                                </td>
                                <td>
                                    <a href="{{route('categorybooks', $book->category->id)}}">
                                        <span id="book-category">{{$book->category->name}}</span>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pdf-Modal">
                                        <i class="fa fa-book-open"></i> Read Book Online
                                    </button>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <a href="{{route('bookdownload', $book->pdf->id)}}" class="btn btn-success"><i class="fa fa-file-download"></i> Download Book</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row">

            </div>
        </div>


    </div>



    <!-- Modal -->

    <div class="modal fade" id="pdf-Modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Book</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <embed  src="/{{$book->pdf? $book->pdf->file: 'No Book Available Right Now'}}" width="1110px" height="1000px" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@stop