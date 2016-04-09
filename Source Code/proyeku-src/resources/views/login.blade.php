<!-- Custom CSS -->
<link href="{{url('/public/assets/css/login.css')}}" rel="stylesheet">
@extends('layout/master-header')

@section('header')
@parent
@stop

@section('content')
<!-- Login Box -->
<div class="container">
  <div class="col-md-12">
    <div class="col-md-4 col-md-offset-4" id="login-div">
      <!-- Pesan session yang akan ditampilkan ketika login error -->
      @if(Session::has('failp'))
      <div class="alert alert-danger">
        <span style="font-size: 16px;">Wrong password!</span>
      </div>
      {{Session::forget('failp')}}
      @endif

      @if(Session::has('failu'))
      <div class="alert alert-danger" >
        <span style="font-size: 16px;">Wrong username!</span>
      </div>
      {{Session::forget('failu')}}
      @endif
      <p class="visible-xs" style="font-size: 40px;">Sign In</p>
      <p class="hidden-xs" style="">Sign In</p>
      {!!Form::open(array('action' => 'HomeController@authentication'))!!}
      <table class="table">
        <tr>
          <span id=input>Email/Username</span>
          <input type="text" name="email" class="form-control" placeholder="example@example.com">
        </tr>
        <br>
        <tr>
          <span id=input>Password</span>
          <input type="password" name="password" class="form-control" placeholder="Password">
        </tr>
      </table>
      <br>
      <table align="center" class="hidden-xs">
       <tr>
        <td>
          <input type="submit" value="Login" id="submit">
        </td>
        <td>
          <span>&nbsp;&nbsp;</span>
        </td>
        <td>
          <input type="checkbox"  value="Remember Me" style="color: red">RememberMe
        </td>
        <td>
          <span>&nbsp;&nbsp;</span>
        </td>
        <td>
          <a href="#" style="font-size: 15px;">Forgot Password?</a>
        </td>
      </tr>
    </table>
    <table align="center" class="visible-xs">
     <tr>
      <td>
        <input type="submit" value="Login" id="submit" style="height: 30px; width: 80px; font-size: 13px;">
      </td>
      <td>
        <span>&nbsp;&nbsp;</span>
      </td>
      <td>
       <input type="checkbox"  value="Remember Me" style="color: red">RememberMe
     </td>
   </tr>
   <tr style="height: 50px;">
    <td>
     <a href="#" style="font-size: 13px;">Forgot Password?</a>
   </td>
 </tr>
</table>
{!!Form::close()!!}
<p style="font-family: Titillium Web; font-size: 20px;"><strong>Or</strong></p>
<input type="submit" value="Sign Up" id="submit" style="background-color: #F26151;">
</div>
</div>
@stop

@extends('layout/master-footer')

@section('footer')
@parent
@stop