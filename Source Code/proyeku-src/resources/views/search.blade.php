<link href="{{url('/assets/css/profile.css')}}" rel="stylesheet">

@extends('layouts.header')
@section('header')
@parent
@stop

@section('content')
<div class="container" id="body">
    <!--
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Search Result of {{$search}}</div>
                
                <div class="panel-body">
                    <form class="navbar-form" role="search" action="{{url('/searchredirect')}}">
                        <div class="input-group">
                            <input type="text" class="form-control" name='search' placeholder="Search">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                            </div>
                        </div>
                    </form>

                    @if(isset($message))
                    <div class="bg-warning" style='padding: 20px'>{{$message}}</div>
                    
                    @else
                    <div class="bg-warning" style='padding: 20px'>{{$search}}</div>

                    <div>
                        @foreach ($jobs as $job)
                            <a href="{{url('/job/'.$job->id)}}">{{ $job->name }}</a>
                            <br/>
                            {{ $job->judul }}
                            <br/>
                            {{ $job->alamat }}
                            <br/>
                            {{ $job->deskripsi }}
                            <br/>
                            {{ $job->upah_max }}
                            {{ $job->upah_min }}
                            <br/>
                            <br/>
                        @endforeach
                        {!! $jobs->links() !!}
                    </div>

                    @endif


                </div>
            </div>
        </div>
    </div>
    -->
    <hr class="hr"></hr>
    @if(isset($message))
    <div class="bg-warning" style='padding: 20px'>{{$message}}</div>

    @else
        @foreach ($jobs as $job)
            <div class="jumbotron">
                <div class="row">
                    <div class="col-md-4">
                        <div class="star-rating">
                            <div class="star-rating__wrap">
                                <input class="star-rating__input" id="star-rating-5" type="radio" name="rating" value="5">
                                <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-5"></label>
                                <input class="star-rating__input" id="star-rating-4" type="radio" name="rating" value="4">
                                <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-4"></label>
                                <input class="star-rating__input" id="star-rating-3" type="radio" name="rating" value="3">
                                <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-3"></label>
                                <input class="star-rating__input" id="star-rating-2" type="radio" name="rating" value="2">
                                <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-2"></label>
                                <input class="star-rating__input" id="star-rating-1" type="radio" name="rating" value="1">
                                <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-1"></label>
                            </div>
                        </div>
                        <div>
                            <a href="{{url('/job/'.$job->id)}}" class="btn btn-default" style="background-color: #F26151; color: white; height: 40px;">
                                <div class="col-md-1">
                                    <strong>Hire</strong>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-8 text-left">
                        <div>
                            <h2>{{ $job->name }} <small>Occupation</small><br><small>{{ $job->alamat }}</small></h2>
                        </div>
                        <div>
                            <h3>{{ $job->judul }}</h3>
                            <h5>
                                {{ $job->deskripsi }} 
                            </h5>
                        </div>
                        <div>
                            <h5>Upah:{{ $job->upah_max }}-{{ $job->upah_min }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {!! $jobs->links() !!}
    @endif
</div>
@endsection
