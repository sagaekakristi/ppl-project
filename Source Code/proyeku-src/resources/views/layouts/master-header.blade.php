<!-- Bagian header -->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Proyeku</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!-- Custom CSS -->
    <link href="{{url('/assets/css/header.css')}}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">

            <!-- Logo Header -->
            <div class="navbar-header">
                <a href="home" class="navbar-brand">
                    <img class="hidden-xs" src="{{url('/assets/pictures/logo-md.png')}}">
                    <img class="visible-xs" src="{{url('/assets/pictures/logo-xs.png')}}" style="margin-left: -10px; margin-top: 10px"> 
                </a>

                <!-- Hamburger Button -->
                <button type="Button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" style="margin-top: 35px; background-color: white;">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Menu Bar -->
            <div class="collapse navbar-collapse" id="navbar" style="margin-top: 30px;">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="login" style="color: #D5EDF5;" class="hidden-xs">Login</a></li>
                    <li><a href="#" style="color: #D5EDF5;" class="hidden-xs">Get Started</a></li>
                    <li><a href="login" style="color: #D5EDF5; font-size: 20px;" class="visible-xs">Login</a></li>
                    <li><a href="#" style="color: #D5EDF5; font-size: 20px" class="visible-xs">Get Started</a></li>
                    <li>
                        <form class="navbar-form" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search">
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>