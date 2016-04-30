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
    @endif

    @if(isset($jobs))
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
                    <button class="btn btn-default" style="background-color: #F26151; color: white; height: 40px;">
                        <div class="col-md-1">
                            <strong>Hire</strong>
                        </div>
                    </button>
                </div>
            </div>
            <div class="col-md-8 text-left">
                <div>
                    <h2>Freelancer Name <small>Occupation</small><br><small>Location</small></h2>
                </div>
                <div>
                    <h3>Job Name</h3>
                    <h5>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean id ornare mauris. In hac habitasse platea dictumst. Vivamus lacinia cursus tellus eu aliquam. Aliquam in porta massa. Nam vulputate diam neque, porta malesuada enim tempor ut. Mauris tincidunt felis vel mauris condimentum faucibus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse lobortis semper ornare. Aliquam venenatis, metus eget varius fringilla, sem felis posuere ligula, facilisis rutrum erat lectus eget ipsum. Suspendisse egestas metus ut neque sagittis laoreet. Proin sed dui massa. Integer odio enim, sollicitudin nec luctus ac, laoreet sit amet sem. Fusce vitae ante vel sem fermentum efficitur. Aliquam in est odio. Maecenas tincidunt pulvinar rhoncus. 
                    </h5>
                </div>
                <div>
                    <h5>Upah:max-min</h5>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
