<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$title or "ID Profile"}}</title>

    <!-- Styles -->
    <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
    <link href="{{ asset('css/w3.css') }}" rel="stylesheet">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
    html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}
    body, html {
        height: 100%;
        color: #777;
        line-height: 1.8;
    }
    </style>
</head>
<body>
    <div id="app">
        @include('include.navbar')
        <div class="container">
            @include('include.messages')
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        
        function addSkill(){
            var x=document.getElementById('skill');
            var str=
            `<div class="w3-row-padding">
                <div class="w3-third">
                  <label>Skill</label>
                  <input class="w3-input w3-border" type="text" name='skill[]'>
                </div>
                <i class="fa fa-close" onclick='removeItem(this);'></i>
            </div>
            `;

            $('#skill').append(str);
        }

        function addHobb(){
            var x=document.getElementById('hobby');
            var str=
            `<div class="w3-row-padding">
                <div class="w3-third">
                  <label>Interest</label>
                  <input class="w3-input w3-border" type="text" name='hobby[]'>
                </div>
                <i class="fa fa-close" onclick='removeItem(this);'></i>
            </div>
            `;
            $('#hobby').append(str);
        }

        function addSocial(){
            var x=document.getElementById('social');
            var str=
            `<div class="w3-row-padding">
                <div class="w3-third">
                  <label>Website name</label>
                  <input class="w3-input w3-border" type="text" name='wname[]'>
                </div>
                <div class="w3-third">
                  <label>url</label>
                  <input class="w3-input w3-border" type="text" name='wurl[]'>
                </div>
                <i class="fa fa-close" onclick='removeItem(this);'></i>
            </div>
            `;
            $('#social').append(str);
        }

        function removeItem(x){
            $(x).parent().remove();
        }
    </script>
</body>
</html>
