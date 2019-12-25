<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Student List</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui" />

        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <!--CSRF Token-->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{asset('css/framework7.bundle.min.css')}}" />
        <link rel="stylesheet" href="{{asset('css/framework7-icons.css')}}" />
        <link rel="stylesheet" href="{{asset('css/main.css')}}">
        
    </head>
    <body>
        <div class="views">  
            <div class="view view-main">  
                
                <div class = "pages navbar-through toolbar-through">  
                    @yield('page')
                </div><!--pages navbar-through toolbar-through-->
                
                
            </div><!--view view-main-->
        </div><!--views-->
        
        <!--Script-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script type = "text/javascript" src = "{{asset('js/framework7.bundle.min.js')}}"></script>
        <script src="{{asset('js/main.js')}}"></script>
        <!--<script>console.log("where " + "{{$where}}");</script>
        @if($where != "")
            <script> console.log("where " + "{{$where}}"); searchbar.enable(); document.getElementById("sInput").value = '{{ $where }}';</script>
        @endif-->
        
    </body>
    
</html>