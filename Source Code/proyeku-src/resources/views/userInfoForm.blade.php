<!-- Custom CSS -->
<link href="{{url('/assets/css/register.css')}}" rel="stylesheet">

@extends('layouts.header')
@section('header')
@parent
@stop

@section('content')
<!-- Register Box --> 
<div class="container">
    <div class="col-md-6 col-md-offset-3" id="register-div">
        <table>
            <tr>
                <td>
                    <p class="visible-xs" style="font-size: 40px; margin-top: 20px; margin-left: 10px;">Sign Up</p>
                    <p class="hidden-xs" style="margin-top: 20px; margin-left: 12px;">Sign Up</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p class="hidden-xs" style="margin-left: 12px; font-size: 22px; font-family: Titillium Web;">It's Free and Forever Ever After</p>
                    <p class="visible-xs" style="margin-left: 12px; font-size: 15px; font-family: Titillium Web;">It's Free and Forever Ever After</p>
                </td>
            </tr>
        </table>
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/profile/add/info') }}">
                {!! csrf_field() !!}
                <div class="form-group {{ $errors->has('tanggal_lahir') ? ' has-error' : '' }}">    
                    <input type="text" class="form-control" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" placeholder="Tanggal Lahir (YYYY-MM-DD)">

                    @if ($errors->has('tanggal_lahir'))
                    <span class="help-block">
                        {{ $errors->first('tanggal_lahir') }}
                    </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('alamat') ? ' has-error' : '' }}">    
                    <input type="text" class="form-control" name="alamat" value="{{ old('alamat') }}" placeholder="Alamat">

                    @if ($errors->has('alamat'))
                    <span class="help-block">
                        {{ $errors->first('alamat') }}
                    </span>
                    @endif
                </div>

                <div class="form-group {{ $errors->has('jenis_kelamin') ? ' has-error' : '' }}">
                    <select class="form-control" name="jenis_kelamin" value="{{ old('jenis_kelamin') }}">
                        <option value="">Jenis Kelamin</option>
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                    </select>  

                    @if ($errors->has('jenis_kelamin'))
                    <span class="help-block">
                        {{ $errors->first('jenis_kelamin') }}
                    </span>
                    @endif
                </div>

                <div class="form-group">
                    <input type="submit" value="Done" id="submit">
                </div>
            </form>
        </div>
    </div>  
</div>
@stop