@extends('layouts.app')

@section('content')
<div class="container">
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
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
